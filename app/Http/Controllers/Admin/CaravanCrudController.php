<?php

namespace App\Http\Controllers\Admin;

use App\Models\Caravan;
use Illuminate\Http\Request;
use App\Http\Requests\CaravanRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

class CaravanCrudController extends CrudController
{
    use \Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation;

    public function setup()
    {
        CRUD::setModel(\App\Models\Caravan::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/caravan');
        CRUD::setEntityNameStrings('caravan', 'caravans');
    }

    protected function setupListOperation()
    {
        CRUD::column('student_full_name');
        CRUD::column('student_birth_date');
        CRUD::column('parent_full_name');
        CRUD::column('student_state');
        /*CRUD::column('parent_email');
        CRUD::column('parent_phone_number');
        $this->crud->addColumn([
            'name'  => 'is_accepted',
            'label' => 'is Accepted', // Table column heading
            'type'  => 'model_function',
            'function_name' => 'isAccepted',
        ],);*/
        $this->crud->addColumn([
            'name'      => 'student_photo', // The db column name
            'label'     => 'Student image', // Table column heading
            'type'      => 'image',
            //'prefix' => 'folder/subfolder/',
            'height' => '60px',
            'width'  => '60px',
        ],);
    }

    protected function setupShowOperation()
    {
        CRUD::column('student_full_name');
        CRUD::column('student_birth_date');
        CRUD::column('student_state');
        CRUD::column('parent_email');
        CRUD::column('parent_phone_number');
        $this->crud->addColumn([
            'name'      => 'student_photo', // The db column name
            'label'     => 'Student image', // Table column heading
            'type'      => 'image',
            //'prefix' => 'folder/subfolder/',
            'height' => '100px',
            'width'  => '100px',
        ],);
        $this->crud->addColumn([
            'name'  => 'is_accepted',
            'label' => 'is Accepted', // Table column heading
            'type'  => 'model_function',
            'function_name' => 'isAccepted',
        ],);
        CRUD::column('student_category');

        $this->crud->addButtonFromModelFunction('line', 'switch_category1', 'switchCategory1', 'beginning');
        $this->crud->addButtonFromModelFunction('line', 'switch_category2', 'switchCategory2', 'beginning');
        $this->crud->addButtonFromModelFunction('line', 'switch_category3', 'switchCategory3', 'beginning');

        $this->crud->addButtonFromModelFunction('line', 'refuse_student', 'refuseStudent', 'beginning');
        $this->crud->addButtonFromModelFunction('line', 'accept_student', 'acceptStudent', 'beginning');
        $this->crud->addButtonFromModelFunction('line', 'show_certificate', 'showCertificate', 'beginning');

    }

    protected function setupUpdateOperation()
    {
        $this->setupCreateOperation();
    }

    protected function addCaravan(Request $request)
    {
        $data = $request->all();
        $disk = "uploads";
        $destination_path = "uploads/carava/" . $request->student_full_name;
        $path = '/SandFishBack/public/uploads/caravan/' . $request->student_full_name . '/';

        if (request()->hasFile('student_photo')) {
            $imageName = $request->student_full_name . '_photo.' . $request->student_photo->getClientOriginalExtension();
            $request->file('student_photo')->storeAs($destination_path, $imageName, $disk);
            $data['student_photo'] = $path . $imageName;
        }

        if (request()->hasFile('student_birth_certificate')) {
            $imageName = $request->student_full_name . '_certificate.' . $request->student_birth_certificate->getClientOriginalExtension();
            $request->file('student_birth_certificate')->storeAs($destination_path, $imageName, $disk);
            $data['student_birth_certificate'] = $path . $imageName;
        }

        $data["is_accepted"] = false;
        $result = Registration::create($data);

        return response()->json([
            "success" => true,
            "message" => "Registration successfully, thank you and we will contact you soon."
        ]);
    }

    public function acceptStudent($id)
    {
        $data["is_accepted"] = true;
        Caravan::where('id', $id)->update($data);
        \Alert::add('success', "Student Accpted Succefully")->flash();
        return redirect()->back();
    }

    public function refuseStudent($id)
    {
        $data["is_accepted"] = false;
        Caravan::where('id', $id)->update($data);
        \Alert::add('success', "Student Refused Succefully")->flash();
        return redirect()->back();
    }

    public function switchCategory1($id)
    {
        $data["student_category"] = "Category N°01";
        Caravan::where('id', $id)->update($data);
        \Alert::add('success', "Student Switched Succefully")->flash();
        return redirect()->back();
    }

    public function switchCategory2($id)
    {
        $data["student_category"] = "Category N°02";
        Caravan::where('id', $id)->update($data);
        \Alert::add('success', "Student Switched Succefully")->flash();
        return redirect()->back();
    }

    public function switchCategory3($id)
    {
        $data["student_category"] = "Category N°03";
        Caravan::where('id', $id)->update($data);
        \Alert::add('success', "Student Switched Succefully")->flash();
        return redirect()->back();
    }

    public function checkCategory(Request $request)
    {
        $registrations = Caravan::where('student_category', '=', $request["student_category"])
            //->where("is_accepted", "=", true)
            ->get();
        $registrationsCount = $registrations->count();
        return response()->json([
            "success" => true,
            "number" => $registrationsCount
        ]);
    }
}
