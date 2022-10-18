@extends('layout.app')

@section('content')
    <map-index
       :offers_data='{!! isset($offers_data) ? $offers_data->toJson() : 'null' !!}'
       inline-template>
        <div class="page-content-wrapper">
            <div class="form-group row">
                <div class="container">
                    <div id="map-container">
                        <div id="map" ></div>
                    </div>
                </div>
            </div>
        </div>
    </map-index>
@endsection
     @push('styles')
      <style>

        .container {
            position: relative;
            width: 100%;
            max-width:2000px;
            margin: auto;
        }

        #map-container {
            padding: 56.25% 0 0 0;
            height: 0;
            position: relative;
        }

        #map {
            position: absolute;
            left: 0;
            top: 0;
            height: 100%;
            width: 100%;
        }
      </style>
    @endpush
