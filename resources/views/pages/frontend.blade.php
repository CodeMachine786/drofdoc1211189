@extends('layouts.auth')
@section('container')

<div class="about-section paddingTB60 gray-bg">
                <div class="container">
                    <div class="row">
						<div class="col-md-12 col-sm-6">
							<div class="about-title clearfix">
								<h1>{{ $data->page_title }}</h1>
									@php echo $data->description @endphp		
							</div>
						</div>
							
                    </div>
                </div>
            </div>

@stop 