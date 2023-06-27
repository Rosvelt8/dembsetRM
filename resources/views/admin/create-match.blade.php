

@extends('layouts.admindash')
@section('content')
        <div class="rs-contact">

            <div class="contact-part sec-bg pt-100 pb-100 md-pt-80 md-pb-80">
                <div class="container">
                    <div class="row">
                        
                        <div class="col-lg-6 pl-50 md-pl-15">
                            <div class="contact-area">
                                <div class="title-style mb-50">
                                    <h2 class="margin-0 uppercase">Creer un Evenement</h2>
                                    <span class="line-bg left-line pt-10 y-b"></span>
                                </div>
                                <div id="form-messages"></div>
                                <form id="contact-form" class="contact-form" method="post" action="{{url('admin/match/store')}}">
                                @csrf
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="from-control">
                                                <input name="equipea" type="text" placeholder="Nom equipe A" id="equipeA" required="required">
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="from-control">
                                                <input name="equipeb" type="text" placeholder="Nom equipe B" id="equipeB" required="required">
                                            </div>
                                        </div>
                                        
                                        
                                        
                                        <div class="col-lg-12">
                                            <div class="from-control">
                                                <input name="stade" type="text" placeholder="Stade" id="subject" required="required">
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="submit-btn">
                                        <button class="readon" type="submit">Creer l'evenement</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                    <div class="rs-cart pt-100 md-pt-80">
                        <div class="container">
                            <div class="cart-wrap pb-100 md-pb-80">
                                <form>
                                    <table class="cart-table">
                                        <thead>
                                            <tr>
                                                <th class="product-thumbnail">equipe A</th>
                                                <th class="product-name">Equipe B</th>
                                                <th class="product-quantity">Stade</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            {{-- <tr>
                                                <td class="product-quantity"><input type="checkbox" class="input-text" step="1" min="0" max="" value="1" pattern="[0-9]*"></td>
                                                <td class="product-name"><a href="#"> VS </a></td>
                                                
                                                <td class="product-price"><span>£</span>200</td>
                                            </tr>
                                             --}}
                                        </tbody>
                                    </table>
                                </form>
                                
                            </div>
            
                            
                            <!-- Subscribe Section End -->
                        </div>
                    </div>
                </div>
            </div>
        </div>

@stop