<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\UserRole;
use App\Models\User;
use App\Http\Requests\StoreEmployeeRequest;
use App\Http\Requests\UpdateEmployeeRequest;
use App\Models\Company;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use JeroenDesloovere\VCard\VCard;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $this->createQRCode();
        
        // Storage::disk('public')->put('imgage.png', $this->generateVCard(Employee::find(2), Company::find(5)));
        // $storagePath = Storage::disk('local')->getDriver()->getAdapter()->getPathPrefix();
        // echo $storagePath.'image.png';
// $vcard = "HelloWord";
// $file = $this->generateVCard(Employee::find(2), Company::find(5));
        // echo 'http://chart.apis.google.com/chart?chs=500x500&cht=qr&chld=Q&chl=' . urlencode($vcard);

        // imagepng($file, public_path('img/qrcodes/qrcode.png'));
        // dd($file);


        // Storage::disk('public')->put("QrCodeTest.png", $this->generateVCard(Employee::find(2), Company::find(5)));
        // dd();
        // dd(public_path('img/qrcode')->files());
        $data['employees'] = DB::table('employees')->select(DB::raw('employees.id as employee_id, employees.status as employeeStatus, employees.*, companies.*'))->join('companies','companies.id','=','employees.company_id')->get();
        $data['Companies'] = Auth::user()->role_id==2 ? Company::all() : Company::where('id', Auth::user()->user_linked_id)->get();
        return view('employee.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreEmployeeRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreEmployeeRequest $request)
    {
        $data = $request->except(['_token']);
        if(!isset($data['profile'])) {
            $profile = 'default-avatar.jpg';
        } else {
            $profile = time().'.'.$request->profile->extension();
            $request->profile->move(public_path('img/avatars'), $profile);
        }
        // $file = $this->generateVCard($data, Company::find($data['company_id']));
        // $this->generateVCard($data);
        $data['photo'] = $profile;
        $password = Hash::make($data['password']);
        $data['password'] = $password;
        $data['created_by'] = Auth::user()->id;
        $data['role_id'] = UserRole::where('role', 'General User')->get()[0]->role_id;
        if($employee = Employee::create($data)) {
            $userData  = [
                'name' => $data['first_name'].' '.$data['last_name'],
                'email' => $data['email'],
                'password' => $password,
                'role_id' => UserRole::where('role', 'General User')->get()[0]->role_id,
                'user_type' => 'Employee',
                'status' => $data['status'],
                'user_linked_id' => $employee->id
            ];
            if(User::create($userData)) {
                return redirect()->back()->with('success', 'Employee added successfully');
            }
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function show(Employee $employee)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function edit(Employee $employee)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateEmployeeRequest  $request
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateEmployeeRequest $request, Employee $employee)
    {
        $data = $request->except(['_token', '_method']);
        // dd($data);
        if(!isset($data['profile'])) {
            $profile = Employee::find($employee->id)->photo;
        } else {
            $profile = time().'.'.$request->profile->extension();
            $request->profile->move(public_path('img/avatars'), $profile);
        }
        // $file = $this->generateVCard($data, Company::find(Employee::find($employee->id)->company_id));
        // $this->generateVCard($data);
        $data['photo'] = $profile;
        $data['updated_by'] = Auth::user()->id;
        if(Employee::where('id', $employee->id)->update($data)) {
            $userData  = [
                'name' => $data['first_name'].' '.$data['last_name'],
                'email' => $data['email'],
                'status' => $data['status'],
            ];
            if(User::where('user_linked_id', $employee->id)->where('user_type', 'Employee')->update($userData)) {
                return redirect()->back()->with('success', 'Employee Updated successfully');
            }
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function destroy(Employee $employee)
    {
        Employee::destroy($employee->id);
        return redirect()->back()->with('success', 'Employee deleted Successfully');
    }

    public function getEmployee()
    {
        $id = request('employee_id');
        $data = Employee::find($id);
        return json_encode($data);
    }

    public function generateQRCode($data, $file_name)
    {
        $result = \QrCode2::format('png')->errorCorrection('Q')->size('500')->margin(0)->generate('DEMO-4444-55555-333-BBB-AAa', public_path('img/qrcodes/qrcode.png'));        
        if (File::exists(public_path('img/qrcodes/qrcode2.png'))) {
            return true;
        }else{
            return false;
        }
    }

    public function generateVCard($data, $company)
    {
        // dd($data['office_no']);
        // Personal Information
        $title = 'Mr.';
        $firstName = $data['first_name'];
        $lastName = $data['last_name'];
        $email = $data['email'];
         // Addresses
        $address = [
            'type' => 'work',
            'pref' => true,
            'street' => $company['address_line1'].' '.$company['address_line2'],
            'city' => $company['city'],
            'state' => $company['state'],
            'country' => $company['country'],
            'zip' => $company['zip_code']
        ];
        $addresses = [$address];
        $workPhone = [
            'type' => 'work',
            'number' => $data['office_phone'],
            'cellPhone' => true
        ];
        $homePhone = [
            'type' => 'home',
            'number' => $data['mobile'],
            'cellPhone' => false
        ];
        $faxNumber = [
            'type' => 'work',
            'number' => $data['fax'],
            'cellPhone' => false
        ];
        $phones = [$workPhone, $homePhone, $faxNumber];
        return \QRCode::vCard($firstName, $lastName, $title, $email, $addresses, $phones);
                // ->setErrorCorrectionLevel('Q')
                // ->setSize(4)
                // ->setMargin(2)
                // ->png();
    }

    public function createQRCode()
    {
        dd($this->downloadVCard(Employee::find(2), Company::find(5)));
        dd($this->generateVCard(Employee::find(2), Company::find(5)));
        $data = $this->getVCardContent(Employee::find(2), Company::find(5));
        // dd(urlencode($data));
        $size = '200x200';
        $logo = public_path('img/logo/dummy_logo.png');

        // header('Content-type: image/png');
        // $QR = imagecreatefrompng('https://chart.googleapis.com/chart?cht=qr&chld=H|1&chs='.$size.'&chl='.urlencode($data));
        $fileName = time().'.png';
        $filePath = public_path("img/qrcodes/$fileName");
        $QR = 'https://chart.googleapis.com/chart?cht=qr&chld=H|1&chs='.$size.'&chl='.urlencode($data);
        dd($QR);
        file_put_contents($filePath, file_get_contents('https://chart.googleapis.com/chart?cht=qr&chld=H|1&chs='.$size.'&chl='.urlencode($data)));
    }

    public function getVCardContent($data, $company):string
    {
        $vcard = "BEGIN:VCARD\nVERSION:3.0\n
                N:" . $data['first_name'] . ";" . $data['last_name'] . "\r\n
                ORG:".$company['name']."\r\n
                TEL;TYPE=work,voice:" . $data['officer_phone'] . "\r\n
                TEL;TYPE=cell,voice:" . $data['mobile'] . "\r\n
                TEL;TYPE=work,fax:" . $data['fax'] . "\r\n
                URL;TYPE=work:www.example.com\r\n
                EMAIL;TYPE=internet,pref:" . $data['email'] . "\r\n
                REV:" . date('Ymd') . "T195243Z\r\n
                END:VCARD";
        return $vcard;
    }

    public function downloadVCard($employee_id)
    {
        $data = DB::table('employees')
                    ->select(DB::raw('employees.id as employee_id, employees.*, companies.*'))
                    ->join('companies','companies.id','=','employees.company_id')
                    ->where('employees.id', $employee_id)
                    ->get();
        // define vcard
        $vcard = new VCard();

        // define variables
        $lastname = $data[0]->last_name;
        $firstname = $data[0]->first_name;
        $additional = '';
        $prefix = '';
        $suffix = '';

        // add personal data
        $vcard->addName($lastname, $firstname, $additional, $prefix, $suffix);

        // add work data
        $vcard->addCompany($data[0]->name);
        $vcard->addJobtitle('');
        $vcard->addRole('');
        $vcard->addEmail($data[0]->email);
        $vcard->addPhoneNumber($data[0]->office_phone, 'PREF;WORK');
        $vcard->addPhoneNumber($data[0]->mobile, 'WORK');
        $vcard->addPhoneNumber($data[0]->fax, 'WORK');

        $addressString = $data[0]->address_line1.' '.$data[0]->address_line2.', '.$data[0]->city.' '.$data[0]->zip_code.' '.$data[0]->state;

        $vcard->addAddress(
            null, 
            null, 
            $data[0]->address_line1.' '.$data[0]->address_line2, 
            $data[0]->city, 
            null, 
            $data[0]->zip_code, 
            $data[0]->state);
        $vcard->addLabel($addressString);
        $vcard->addURL($data[0]->website);

        $vcard->addPhoto(public_path('img/avatars/default-avatar.jpg'));

        // return vcard as a string
        //return $vcard->getOutput();

        // return vcard as a download
        return $vcard->download();

        // save vcard on disk
        //$vcard->setSavePath('/path/to/directory');
        //$vcard->save();
    }
}