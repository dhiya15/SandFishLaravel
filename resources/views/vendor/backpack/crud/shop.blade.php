@extends(backpack_view('blank'))
@section('before_breadcrumbs_widgets')
    <nav aria-label="breadcrumb" class="d-none d-lg-block">
        <ol class="breadcrumb bg-transparent p-0 justify-content-end">
            <li class="breadcrumb-item text-capitalize"><a
                    href="{{backpack_url('dashboard')}}">Administration</a></li>
            <li class="breadcrumb-item text-capitalize active" aria-current="page">Magasin</li>
        </ol>
    </nav>
    <div class="container-fluid">
        <h2>
            <span class="text-capitalize">Magasin</span>
        </h2>
    </div>
@endsection
@section('content')
    <div class="row">
        <div class="col-md-12 bold-labels">
            @if ($errors->any())
                <div class="alert alert-danger pb-0">
                    <ul class="list-unstyled">
                        @foreach ($errors->all() as $error)
                            <li><i class="la la-info-circle"></i> {{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <form method="post" action="{{route('shop.update')}}" enctype="multipart/form-data">
                @csrf
                <div class="card">
                    <div class="card-body row">
                        <div class="form-group col-lg-4 col-sm-12">
                            <label>Logo</label>
                            @if($shop->logo)
                                <img src="{{$shop->logo}}" width="100" class="img-thumbnail float-right mb-2">
                            @endif
                            <div class="custom-file">
                                <input type="file" class="custom-file-input @error('logo') is-invalid @enderror"
                                       name="logo">
                                <label class="custom-file-label">Choisir l'image...</label>
                                @error('logo')
                                <div class="invalid-feedback">{{$message}}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group col-lg-4 col-sm-12">
                            <label>Name</label>
                            <input type="text" name="name" value="{{$shop->name}}"
                                   class="form-control @error('name') is-invalid @enderror">
                            @error('name')
                            <div class="invalid-feedback">{{$message}}</div>
                            @enderror
                        </div>
                        <div class="form-group col-lg-4 col-sm-12">
                            <label>Title</label>
                            <input type="text" name="title" value="{{$shop->title}}"
                                   class="form-control @error('title') is-invalid @enderror">
                            @error('title')
                            <div class="invalid-feedback">{{$message}}</div>
                            @enderror
                        </div>
                        <div class="form-group col-lg-12 col-sm-12">
                            <label>Description</label>
                            <textarea type="text" name="description"
                                      class="form-control @error('description') is-invalid @enderror">{{$shop->description}}</textarea>
                            @error('description')
                            <div class="invalid-feedback">{{$message}}</div>
                            @enderror
                        </div>
                        <div class="form-group col-lg-12 col-sm-12">
                            <label>Description courte</label>
                            <input type="text" name="footer_short_des" value="{{$shop->footer_short_des}}"
                                   class="form-control @error('footer_short_des') is-invalid @enderror">
                            @error('google_plshort_des')
                            <div class="invalid-feedback">{{$message}}</div>
                            @enderror
                        </div>
                        <div class="form-group col-lg-4 col-sm-12">
                            <label>Téléphone</label>
                            <input type="text" name="phone" value="{{$shop->phone}}"
                                   class="form-control @error('phone') is-invalid @enderror">
                            @error('phone')
                            <div class="invalid-feedback">{{$message}}</div>
                            @enderror
                        </div>
                        <div class="form-group col-lg-4 col-sm-12">
                            <label>Téléphone(2)</label>
                            <input type="text" name="fax" value="{{$shop->fax}}"
                                   class="form-control @error('fax') is-invalid @enderror">
                            @error('fax')
                            <div class="invalid-feedback">{{$message}}</div>
                            @enderror
                        </div>
                        <div class="form-group col-lg-4 col-sm-12">
                            <label>Email d'assistance</label>
                            <input type="text" name="email" value="{{$shop->email}}"
                                   class="form-control @error('email') is-invalid @enderror">
                            @error('email')
                            <div class="invalid-feedback">{{$message}}</div>
                            @enderror
                        </div><div class="form-group col-lg-4 col-sm-12">
                            <label>Pays</label>
                            <input type="text" name="country" value="{{$shop->country}}"
                                   class="form-control  @error('country') is-invalid @enderror">
                            @error('country')
                            <div class="invalid-feedback">{{$message}}</div>
                            @enderror
                        </div>
                        <div class="form-group col-lg-4 col-sm-12">
                            <label>Code postal</label>
                            <input type="text" name="post_code" value="{{$shop->post_code}}"
                                   class="form-control @error('post_code') is-invalid @enderror">
                            @error('post_code')
                            <div class="invalid-feedback">{{$message}}</div>
                            @enderror
                        </div>
                        <div class="form-group col-lg-4 col-sm-12">
                            <label>Adresse</label>
                            <input type="text" name="address" value="{{$shop->address}}"
                                   class="form-control @error('address') is-invalid @enderror">
                            @error('address')
                            <div class="invalid-feedback">{{$message}}</div>
                            @enderror
                        </div>
                        <div class="form-group col-lg-4 col-sm-12">
                            <label>Site web</label>
                            <input type="text" name="website" value="{{$shop->website}}"
                                   class="form-control @error('website') is-invalid @enderror">
                            @error('website')
                            <div class="invalid-feedback">{{$message}}</div>
                            @enderror
                        </div>
                        <div class="form-group col-lg-4 col-sm-12">
                            <label>Twitter</label>
                            <input type="text" name="twitter" value="{{$shop->twitter}}"
                                   class="form-control @error('twitter') is-invalid @enderror">
                            @error('twitter')
                            <div class="invalid-feedback">{{$message}}</div>
                            @enderror
                        </div>
                        <div class="form-group col-lg-4 col-sm-12">
                            <label>Facebook</label>
                            <input type="text" name="facebook" value="{{$shop->facebook}}"
                                   class="form-control @error('facebook') is-invalid @enderror">
                            @error('facebook')
                            <div class="invalid-feedback">{{$message}}</div>
                            @enderror
                        </div>
                        <div class="form-group col-lg-4 col-sm-12">
                            <label>Instagram</label>
                            <input type="text" name="instagram" value="{{$shop->instagram}}"
                                   class="form-control @error('instagram') is-invalid @enderror">
                            @error('instagram')
                            <div class="invalid-feedback">{{$message}}</div>
                            @enderror
                        </div>
                        <div class="form-group col-lg-4 col-sm-12">
                            <label>Google plus</label>
                            <input type="text" name="google_plus" value="{{$shop->google_plus}}"
                                   class="form-control @error('google_plus') is-invalid @enderror">
                            @error('google_plus')
                            <div class="invalid-feedback">{{$message}}</div>
                            @enderror
                        </div>
                        <div class="form-group col-lg-4 col-sm-12">
                            <label>Working days</label>
                            <input type="text" name="working_days" value="{{$shop->working_days}}"
                                   class="form-control @error('working_days') is-invalid @enderror">
                            @error('working_days')
                            <div class="invalid-feedback">{{$message}}</div>
                            @enderror
                        </div>
                        <div class="form-group col-lg-4 col-sm-12">
                            <label>Working hours</label>
                            <input type="text" name="working_hours" value="{{$shop->working_hours}}"
                                   class="form-control @error('working_hours') is-invalid @enderror">
                            @error('working_hours')
                            <div class="invalid-feedback">{{$message}}</div>
                            @enderror
                        </div>
                        <div class="form-group col-lg-4 col-sm-12">
                            <label>Latitude</label>
                            <input type="text" name="latitude" value="{{$shop->latitude}}"
                                   class="form-control @error('latitude') is-invalid @enderror">
                            @error('latitude')
                            <div class="invalid-feedback">{{$message}}</div>
                            @enderror
                        </div>
                        <div class="form-group col-lg-4 col-sm-12">
                            <label>Longitude</label>
                            <input type="text" name="longitude" value="{{$shop->longitude}}"
                                   class="form-control @error('longitude') is-invalid @enderror">
                            @error('longitude')
                            <div class="invalid-feedback">{{$message}}</div>
                            @enderror
                        </div>
                        <div class="form-group col-lg-4 col-sm-12">
                            <div class="form-check">
                                <label class="form-check-label">
                                    <input type="checkbox" class="form-check-input" value="1" name="website_under_maintenance"
                                           @if($shop->website_under_maintenance) checked  @endif
                                           style="cursor: pointer"> Website under maintenance
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="btn-group" role="group">
                        <button type="submit" class="btn btn-success">
                            <span class="la la-save"></span> Save
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
