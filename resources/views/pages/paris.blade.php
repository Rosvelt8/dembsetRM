<?php
use Illuminate\Support\Facades\Session;
$user= Session::get('user');
?>
@extends('layouts.dashboard')
@section('title','VOS PARIS')
@include('layouts.includes.breadcrumb')

@section('content')
        <!-- checkout Page Start Here -->
        <div class="rs-cart pt-100 md-pt-80">
            <div class="container">
                <div class="cart-wrap pb-100 md-pb-80">
                    <form>
                        <table class="cart-table">
                            <thead>
                                <tr>
                                    <th class="product-thumbnail"></th>
                                    <th class="product-name">Evenement</th>
                                    <th class="product-remove">statut</th>
                                    <th class="product-price">Parié</th>
                                    <th class="product-quantity">Cote</th>
                                    <th class="product-subtotal">Gain Potentiel</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($paris as $pari)
                                <tr>
                                    <td class="product-thumbnail">{{$pari->intitule}}</td>
                                    <td class="product-name"><a href="#">{{$pari->equipea}} VS {{$pari->equipeb}}</a></td>
                                    <td class="product-name">
                                        @if ($pari->statut=='A')
                                            <span class="text-warning text-bold">En Attente</span> 
                                        @endif
                                        @if ($pari->statut=='G')
                                            <span class="text-success text-bold">Gagné</span>
                                        @endif
                                        @if ($pari->statut=='P')
                                        <span class="text-danger text-bold">Perdu</span>
                                        @endif
                                    </td>
                                    <td class="product-price"><span>£</span>{{$pari->montant}}</td>
                                    <td class="product-quantity"><input type="number" class="input-text" step="1" disabled min="0" max="" value="1" pattern="[0-9]*"></td>
                                    <td class="subtotal"><span class="amount text-success"><span class="symbol">£</span>{{$pari->gain}}</span></td>
                                </tr>
                                @endforeach
                                
                            </tbody>
                        </table>
                    </form>
                    
                </div>

                
                <!-- Subscribe Section End -->
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

       