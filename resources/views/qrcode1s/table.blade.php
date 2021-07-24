<div class="table-responsive">
    <table class="table" id="qrcode1s-table">
        <thead>
            <tr>
                <th>User Id</th>
        <th>Brand Name</th>
        <th>Product Name</th>
        <th>Quantity</th>
        <!-- <th>Qrcode Path</th> -->
        <th>Amount</th>
        <th>Status</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($qrcode1s as $qrcode1)
            <tr>
                <td>{{ $qrcode1->user_id }}</td>
            <td>{{ $qrcode1->brand_name }}</td>
            <td>
                <a class="text-info" href="{{ route('qrcode1s.show', [$qrcode1->id]) }}">
                <b> {{ $qrcode1->product_name }} </b>
                </a>
            </td>
            <td>{{ $qrcode1->quantity }}</td>
            <!-- <td>{{ $qrcode1->qrcode_path }}</td> -->
            <td>Rs:{{ $qrcode1->amount }}</td>
            <td>
                @if($qrcode1->status==1)
                    <i class="fa fa-check-circle text-green"></i> 
                    <!-- {{ $qrcode1->status }} -->
                @else
                    <i class="fa fa-times-circle text-red"></i>
                    
                @endif    
            </td>
                <td>
                    {!! Form::open(['route' => ['qrcode1s.destroy', $qrcode1->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('qrcode1s.show', [$qrcode1->id]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                        <a href="{{ route('qrcode1s.edit', [$qrcode1->id]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                        {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
