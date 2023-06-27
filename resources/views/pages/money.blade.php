<?php
use Illuminate\Support\Facades\Session;
$user= Session::get('user');
?>
@extends('layouts.dashboard')
@section('title','VOTRE COMPTE')
@include('layouts.includes.breadcrumb')

@section('content')
        <!-- checkout Page Start Here -->
        <div id="rs-checkout" class="rs-checkout pt-100 md-pt-80">
            <div class="container">
                

                <div class="full-grid pb-100 md-pb-80">
                    <form action="{{url('retirer')}}" method="post">
                        @csrf
                        <div class="billing-fields">
                            <div class="checkout-title">
                                <h3>Retirer vos gains</h3>
                            </div>
                            <div class="form-content-box">
                                <div class="row">
                                    <div class="col-md-6 col-sm-12 col-xs-12">
                                        <div class="form-group">
                                            <label>telephone *</label>
                                            <input id="fname" name="phone" value="237{{$user->phone}}" class="form-control-mod" type="tel" readonly required>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-sm-12 col-xs-12">
                                        <div class="form-group">
                                            <label>Montant *</label>
                                            <input id="lname" name="montant" class="form-control-mod" type="text" required>
                                        </div>
                                    </div>
                                </div>
                                
                                
                            </div>
                        </div><!-- .billing-fields -->

                        

                        <div class="payment-method mt-40 md-mt-20">
                            <div class="bottom-area">
                                <button class="readon" type="submit">Continuer le paiement</button>
                            </div>
                        </div>
                    </form>
                </div>

                
            </div>
        </div>
        <div id="rs-checkout" class="rs-checkout pt-20 md-pt-80">
            <div class="container">
                

                <div class="full-grid pb-100 md-pb-80">
                    <form action="{{url('deposer')}}" method="post">
                        @csrf
                        <div class="billing-fields">
                            <div class="checkout-title">
                                <h3>Déposez de l'argent</h3>
                            </div>
                            <div class="form-content-box">
                                <div class="row">
                                    <div class="col-md-6 col-sm-12 col-xs-12">
                                        <div class="form-group">
                                            <label>telephone *</label>
                                            <input id="fname" name="phone" value="237{{$user->phone}}" class="form-control-mod" type="tel" readonly required>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-sm-12 col-xs-12">
                                        <div class="form-group">
                                            <label>Montant *</label>
                                            <input id="lname" name="montant" class="form-control-mod" type="text" required>
                                        </div>
                                    </div>
                                </div>
                                
                                
                            </div>
                        </div><!-- .billing-fields -->

                        

                        <div class="payment-method mt-40 md-mt-20">
                            <div class="bottom-area">
                                <button class="readon" type="submit">Continuer le paiement</button>
                            </div>
                        </div>
                    </form>
                </div>

                
            </div>
        </div>
@stop

@section('script')

     <script src="https://demo.campay.net/sdk/js?app-id=oULqGBsnKvdo6vZRXmI8gayZsmeoqLXCuodaRGYaFnX-Er66aNHBKb3H5USEMm1QWMhrBcuptRAhE6WB638a8A"></script>

<script>
    campay.options({
        payButtonId: "payButton", //Required
        description: "", //Required
        amount: "", //Optional
        currency: "XAF", //Required
        externalReference: "", //Optional
        redirectUrl: "", //Optional
    });
    
    campay.onSuccess = function (data) { 
        alert('Status: '+data.status+'\n reference: '+data.reference) 
    }
    
    campay.onFail = function (data) { 
        alert('Status: '+data.status+'\n reference: '+data.reference) 
    }

</script>

@stop

       