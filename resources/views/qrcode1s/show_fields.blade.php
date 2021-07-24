<div class="col-md-6">
    <!-- Product Name Field -->
    <div class="form-group">
        <h2>
            {!! Form::label('product_name', 'Product Name:') !!}
            <p>{{ $qrcode1->product_name }}</p>
        </h2>
    </div>
    <!-- Brand Name Field -->
    <div class="form-group">
        <h3>
            {!! Form::label('brand_name', 'Brand Name:') !!}
            <p>{{ $qrcode1->brand_name }}</p>
        </h3>
    </div>

    <!-- Id Field -->
    <div class="form-group">
        {!! Form::label('id', 'Id:') !!}
        <p>{{ $qrcode1->id }}</p>
    </div>

    <!-- User Id Field -->
    <div class="form-group">
        {!! Form::label('user_id', 'User Id:') !!}
        <p>{{ $qrcode1->user_id }}</p>
    </div>

    
    <!-- Quantity Field -->
    <div class="form-group">
        {!! Form::label('quantity', 'Quantity:') !!}
        <p>{{ $qrcode1->quantity }}</p>
    </div>

    

    <!-- Amount Field -->
    <div class="form-group">
        {!! Form::label('amount', 'Amount:') !!}
        <p>{{ $qrcode1->amount }}</p>
    </div>

    <!-- Status Field -->
    <div class="form-group">
        {!! Form::label('status', 'Status:') !!}
        <p>{{ $qrcode1->status }}</p>
    </div>

    <!-- Created At Field -->
    <div class="form-group">
        {!! Form::label('created_at', 'Created At:') !!}
        <p>{{ $qrcode1->created_at }}</p>
    </div>

    <!-- Updated At Field -->
    <div class="form-group">
        {!! Form::label('updated_at', 'Updated At:') !!}
        <p>{{ $qrcode1->updated_at }}</p>
    </div>
</div>


<div class="col-md-5 pull-right">
    <!-- Qrcode Path Field -->
    <div class="form-group">
        {!! Form::label('qrcode_path', 'Scan Qrcode and get all detals about products:') !!}
        <p>
        <img src="{{asset($qrcode1->qrcode_path)}}">
        </p>
    </div>
</div>
