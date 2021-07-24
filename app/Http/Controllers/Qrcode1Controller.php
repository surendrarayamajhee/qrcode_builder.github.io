<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateQrcode1Request;
use App\Http\Requests\UpdateQrcode1Request;
use App\Repositories\Qrcode1Repository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use QRCode;
use App\Models\Qrcode1 as Qrcode1Model;
use Auth;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class Qrcode1Controller extends AppBaseController
{
    /** @var  Qrcode1Repository */
    private $qrcode1Repository;

    public function __construct(Qrcode1Repository $qrcode1Repo)
    {
        $this->qrcode1Repository = $qrcode1Repo;
    }

    /**
     * Display a listing of the Qrcode1.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->qrcode1Repository->pushCriteria(new RequestCriteria($request));
        $qrcode1s = $this->qrcode1Repository->all();

        return view('qrcode1s.index')
            ->with('qrcode1s', $qrcode1s);
    }

    /**
     * Show the form for creating a new Qrcode1.
     *
     * @return Response
     */
    public function create()
    {
        return view('qrcode1s.create');
    }

    /**
     * Store a newly created Qrcode1 in storage.
     *
     * @param CreateQrcode1Request $request
     *
     * @return Response
     */
    public function store(CreateQrcode1Request $request)
    {
        $input = $request->all();

        $qrcode1 = $this->qrcode1Repository->create($input);
        //generate qrcode
        //save qrcode image our folder on this site location
        $file = 'generated_qrcodes/'.$qrcode1->id.'.png';
        

        $newQrcode = QRCode::text("message")
        ->setSize(8)
        ->setMargin(2)
        ->setOutfile($file)
        ->png();
        $input['qrcode_path'] = $file;
            //upadate database
            $newQrcode = Qrcode1Model::where('id',$qrcode1->id)->update(['qrcode_path'=> $input['qrcode_path']]);
            //save data to  the database
        if($newQrcode){
            
            //$qrcode1 = $this->qrcode1Repository->create($input);
            Flash::success('Qrcode image saved successfully.');
        }else{
            Flash::error('Qrcode image failed to saved successfully.');
        }
        
        

        return redirect(route('qrcode1s.show',['qrcode1'=>$qrcode1]));
    }

    /**
     * Display the specified Qrcode1.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $qrcode1 = $this->qrcode1Repository->findWithoutFail($id);

        if (empty($qrcode1)) {
            Flash::error('Qrcode1 not found');

            return redirect(route('qrcode1s.index'));
        }

        return view('qrcode1s.show')->with('qrcode1', $qrcode1);
    }

    /**
     * Show the form for editing the specified Qrcode1.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $qrcode1 = $this->qrcode1Repository->findWithoutFail($id);

        if (empty($qrcode1)) {
            Flash::error('Qrcode1 not found');

            return redirect(route('qrcode1s.index'));
        }

        return view('qrcode1s.edit')->with('qrcode1', $qrcode1);
    }

    /**
     * Update the specified Qrcode1 in storage.
     *
     * @param  int              $id
     * @param UpdateQrcode1Request $request
     *
     * @return Response
     */
    public function update($id, UpdateQrcode1Request $request)
    {
        $qrcode1 = $this->qrcode1Repository->findWithoutFail($id);

        if (empty($qrcode1)) {
            Flash::error('Qrcode1 not found');

            return redirect(route('qrcode1s.index'));
        }

        $qrcode1 = $this->qrcode1Repository->update($request->all(), $id);

        Flash::success('Qrcode1 updated successfully.');

        return redirect(route('qrcode1s.show',['qrcode1'=>$qrcode1]));
    }

    /**
     * Remove the specified Qrcode1 from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $qrcode1 = $this->qrcode1Repository->findWithoutFail($id);

        if (empty($qrcode1)) {
            Flash::error('Qrcode1 not found');

            return redirect(route('qrcode1s.index'));
        }

        $this->qrcode1Repository->delete($id);

        Flash::success('Qrcode1 deleted successfully.');

        return redirect(route('qrcode1s.index'));
    }
}
