@extends('panel.sa.layouts.app')

@section('title', 'داشبورد')

@section('breadcrumbs')

@endsection

@section('content')
    <div class="content-body">
        <section id="alert-example">
            <div class="row">
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Example</h4>
                        </div>
                        <div class="card-content">
                            <div class="card-body">
                                <p>
                                    An example would be to have an input and when a condition is met,
                                    show the alert. use class <code>.alert-validation</code> for your input and class
                                    <code>.alert-validation-msg</code> with your alert.
                                </p>
                                <form>
                                    <label for="numbers">Enter Only Numbers</label>
                                    <input id="numbers" class="form-control w-25 h-25 pl-1 alert-validation" type="text" placeholder="0123456789" />
                                </form>
                                <div class="alert alert-danger mt-1 alert-validation-msg" role="alert">
                                    <i class="feather icon-info mr-1 align-middle"></i>
                                    <span>the value is <strong>invalid</strong> you can only enter numbers</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
