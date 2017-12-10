@extends('layouts.app') @section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">Overview
                </div>
                <div class="panel-body">
                    @if (session('status'))
                    <div class="alert alert-success">
                        {{ session('status') }}
                    </div>
                    @endif
                </div>
                {{-- Template Start --}}
                <div class="container-fluid">
                    {{-- display stored tasks --}} 
                    @if (count($storedCryptos) > 0)
                    <table class="table">
                        <thead>
                            <th>#</th>
                            <th>Name</th>
                            <th>Symbol</th>                            
                            <th>Current Price</th>
                            <th>Circulating Supply</th>
                            <th>Add similar Coins</th>
                        </thead>

                        <tbody>
                            @foreach ($storedCryptos as $cryptos)
                            <tr>
                                <td>{{ $cryptos->id }}</td>
                                <td>
                                <img style="height: 16px; width: 16px;" src="{{ asset('images')}}/{{ $cryptos->asset_logo }}" />
                                <a href="{{ route('edit', ['cryptos'=>$cryptos ->id]) }}" >{{ $cryptos->name }}</a>
                                </td>
                                <td>{{ $cryptos->symbol }}</td>
                                <td>{{ $cryptos->current_price }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    @endif

                    <div class="row text-center">
                        {{ $storedCryptos->links() }}
                    </div>
                </div>
                {{-- Template End --}}
            </div>
        </div>
    </div>
</div>
@endsection
