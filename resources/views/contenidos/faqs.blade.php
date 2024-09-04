@extends('layouts.master')

@section('title') @lang('translation.Form_Layouts') @endsection

@section('content')

@component('components.breadcrumb')
@slot('li_1') Faqs @endslot
@slot('title') Registro FAQs @endslot
@endcomponent


<div class="row">
    <div class="col-xl-6">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Floating labels</h5>
                <p class="card-title-desc">Create beautifully simple form labels that float over your input fields.</p>

                <form>
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="floatingnameInput" placeholder="Enter Name">
                        <label for="floatingnameInput">Name</label>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-floating mb-3">
                                <input type="email" class="form-control" id="floatingemailInput" placeholder="Enter Email address">
                                <label for="floatingemailInput">Email address</label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-floating mb-3">
                                <select class="form-select" id="floatingSelectGrid" aria-label="Floating label select example">
                                    <option selected>Open this select menu</option>
                                    <option value="1">One</option>
                                    <option value="2">Two</option>
                                    <option value="3">Three</option>
                                </select>
                                <label for="floatingSelectGrid">Works with selects</label>
                            </div>
                        </div>
                    </div>

                    <div class="mb-3">

                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="floatingCheck">
                            <label class="form-check-label" for="floatingCheck">
                                Check me out
                            </label>
                        </div>
                    </div>
                    <div>
                        <button type="submit" class="btn btn-primary w-md">Submit</button>
                    </div>
                </form>
            </div>
            <!-- end card body -->
        </div>
        <!-- end card -->
    </div>
    <!-- end col -->

    <div class="col-lg-6">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title mb-4">Inline Forms With Hstack</h5>

                <div class="hstack gap-3">
                    <input class="form-control me-auto" type="text" placeholder="Add your item here..." aria-label="Add your item here...">
                    <button type="button" class="btn btn-secondary">Submit</button>
                    <div class="vr"></div>
                    <button type="button" class="btn btn-outline-danger">Reset</button>
                </div>

            </div>
            <!-- end card body -->
        </div>
        <!-- end card -->
    </div>
    <!-- end col -->
</div>
<!-- end row -->

@endsection