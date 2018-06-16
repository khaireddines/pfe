@extends('layouts.admin.adminDashbord')
@section('custemImp')
    @endsection
@section('content')
    @php
           $department=new \App\departement();
            $training=new \App\formation();
            $teachingUnit=new \App\uni_enseignement();
            $classes=new \App\classe();
            $subjects=new \App\matiere();
            $professor=new \App\enseignant();
            @endphp
    <h3>{{__('EnTp.Resources')}}</h3>
    <hr>
    <div class="row">

        <div class="col-md-4">
            <div class="card card-product" data-count="5">
                <div class="card-header card-header-image animated" data-header-animation="true" >
                    <a href="#pablo">
                        <img class="img" src="{{asset('img/Training.jpg')}}" style="height: 200px;max-height: 200px">
                    </a>
                </div>
                <div class="card-body" style="height: 130px">
                    <div class="card-actions text-center">
                        <button type="button" class="btn btn-danger btn-link fix-broken-card">
                            <i class="material-icons">build</i> Fix Header!
                            </button>

                        <button type="button" onclick="location.href='/formation';" class="btn btn-default btn-link" rel="tooltip" data-placement="bottom" title="" data-original-title="View">
                            <i class="material-icons">art_track</i>
                        </button>


                    </div>
                    <h4 class="card-title">
                        <a href="/formation">{{__('EnTp.Training')}}</a>
                    </h4>
                    <div class="card-description">
                        {{__('EnTp.TrainingDis')}}
                    </div>
                </div>
                <div class="card-footer">

                    <div class="stats">

                    </div>
                    <div class="price">
                        <h4>{{$training->CountTraining()}}/{{__('EnTp.Department')}}</h4>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card card-product" data-count="1">
                <div class="card-header card-header-image animated" data-header-animation="true" >
                    <a href="#pablo">
                        <img class="img" src="{{asset('img/TeachingUnit.jpg')}}" style="height: 200px;max-height: 200px">
                    </a>
                </div>
                <div class="card-body" style="height: 130px">
                    <div class="card-actions text-center">
                        <button type="button" class="btn btn-danger btn-link fix-broken-card">
                            <i class="material-icons">build</i> Fix Header!
                            <div class="ripple-container"></div></button>
                        <button type="button" onclick="location.href='/Unite_ens';" class="btn btn-default btn-link" rel="tooltip" data-placement="bottom" title="" data-original-title="View">
                            <i class="material-icons">art_track</i>
                        </button>


                    </div>
                    <h4 class="card-title">
                        <a href="/Unite_ens">{{__('EnTp.Teaching Unit')}}</a>
                    </h4>
                    <div class="card-description">
                        {{__('EnTp.Teaching UnitDis')}}
                    </div>
                </div>
                <div class="card-footer">

                    <div class="stats">

                    </div>
                    <div class="price">
                        <h4>{{$teachingUnit->CountUnit()}}/{{__('EnTp.Training')}}</h4>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card card-product" data-count="1">
                <div class="card-header card-header-image animated" data-header-animation="true">
                    <a href="#pablo">
                        <img class="img" src="{{asset('img/Subjects.jpg')}}" style="height: 200px;max-height: 200px">
                    </a>
                </div>
                <div class="card-body" style="height: 130px">
                    <div class="card-actions text-center">
                        <button type="button" class="btn btn-danger btn-link fix-broken-card">
                            <i class="material-icons">build</i> Fix Header!
                            <div class="ripple-container"></div></button>
                        <button type="button" onclick="location.href='/Matiere';" class="btn btn-default btn-link" rel="tooltip" data-placement="bottom" title="" data-original-title="View">
                            <i class="material-icons">art_track</i>
                        </button>

                    </div>
                    <h4 class="card-title">
                        <a href="/Matiere">{{__('EnTp.Subject')}}</a>
                    </h4>
                    <div class="card-description">
                        {{__('EnTp.SubjectDis')}}
                    </div>
                </div>
                <div class="card-footer">

                    <div class="stats">

                    </div>
                    <div class="price">
                        <h4>{{$subjects->CountSubject()}}/{{__('EnTp.Teaching Unit')}}</h4>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card card-product" data-count="7">
                <div class="card-header card-header-image animated" data-header-animation="true">
                    <a href="#pablo">
                        <img class="img" src="{{asset('img/department.jpg')}}" style="height: 200px;max-height: 200px">
                    </a>
                </div>
                <div class="card-body" style="height: 130px">
                    <div class="card-actions text-center">
                        <button type="button" class="btn btn-danger btn-link fix-broken-card">
                            <i class="material-icons">build</i> Fix Header!
                        </button>
                        <button type="button" onclick="location.href='/departement';" class="btn btn-default btn-link" rel="tooltip" data-placement="bottom" title="View" data-original-title="View">
                            <i class="material-icons">art_track</i>
                        </button>

                    </div>
                    <h4 class="card-title">
                        <a href="/departement">{{__('EnTp.Department')}}</a>
                    </h4>
                    <div class="card-description">
                        {{__('EnTp.DepartmentDis')}}
                    </div>
                </div>
                <div class="card-footer">
                    <div class="stats">

                    </div>

                    <div class="price">
                        <h4>{{$department->CountDepartment()}}/{{__('EnTp.University')}}</h4>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card card-product" data-count="1">
                <div class="card-header card-header-image animated" data-header-animation="true">
                    <a href="#pablo">
                        <img class="img" src="{{asset('img/Classes.jpg')}}" style="height: 200px;max-height: 200px">
                    </a>
                </div>
                <div class="card-body" style="height: 130px">
                    <div class="card-actions text-center" >
                        <button type="button" class="btn btn-danger btn-link fix-broken-card">
                            <i class="material-icons">build</i> Fix Header!
                            <div class="ripple-container"></div></button>
                        <button type="button" onclick="location.href='/Class';" class="btn btn-default btn-link" rel="tooltip" data-placement="bottom" title="" data-original-title="View">
                            <i class="material-icons">art_track</i>
                        </button>

                    </div>
                    <h4 class="card-title">
                        <a href="/Class">{{__('EnTp.Class')}}</a>
                    </h4>
                    <div class="card-description">
                        {{__('EnTp.ClassDis')}}
                        <br>
                    </div>
                </div>
                <div class="card-footer">

                    <div class="stats">

                    </div>
                    <div class="price">
                        <h4>{{$classes->CountClasses()}}/{{__('EnTp.Training')}}</h4>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card card-product" data-count="1">
                <div class="card-header card-header-image animated" data-header-animation="true">
                    <a href="#pablo">
                        <img class="img" src="{{asset('img/Professors.jpg')}}" style="height: 200px;max-height: 200px">
                    </a>
                </div>
                <div class="card-body" style="height: 130px">
                    <div class="card-actions text-center">
                        <button type="button" class="btn btn-danger btn-link fix-broken-card">
                            <i class="material-icons">build</i> Fix Header!
                            <div class="ripple-container"></div></button>
                        <button type="button" onclick="location.href='/Enseignant';" class="btn btn-default btn-link" rel="tooltip" data-placement="bottom" title="" data-original-title="View">
                            <i class="material-icons">art_track</i>
                        </button>

                    </div>
                    <h4 class="card-title">
                        <a href="/Enseignant">{{__('EnTp.Professor')}}</a>
                    </h4>
                    <div class="card-description">
                        {{__('EnTp.ProfessorDis')}}
                    </div>
                </div>
                <div class="card-footer">

                    <div class="stats">

                    </div>
                    <div class="price">
                        <h4>{{$professor->CountProfessor()}}/{{__('EnTp.University')}}</h4>
                    </div>
                </div>
            </div>
        </div>

    </div>

    @endsection
@section('custemScript')
    <script>
        $(".Dashboard").addClass('active');
    </script>
    @endsection