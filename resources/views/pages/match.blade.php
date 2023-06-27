<?php
use App\Models\Choix;
?>
@extends('layouts.dashboard')
@section('content')
    <!-- Breadcrumbs Section Start -->
    <div class="rs-breadcrumbs">
        <div class="breadcrumbs-wrap">
            <img src="images/breadcrumbs/inner11.jpg" alt="Breadcrumbs Image">
            <div class="breadcrumbs-inner vertical-middle">
                <div class="container">
                    <div class="breadcrumbs-text">
                        
                    </div>
                </div>
            </div>
        </div>                
    </div>
    <!-- Breadcrumbs Section End -->

    <!-- Single Club Section Start -->
    <div class="rs-single-club sec-bg md-pb-80">
        <div class="container">
            <div class="rs-match-result style1 modify-style fly-box">
                <div class="rs-carousel owl-carousel owl-theme owl-loaded owl-responsive-768" data-loop="true" data-items="1" data-margin="30" data-autoplay="false" data-autoplay-timeout="8000" data-smart-speed="2000" data-dots="false" data-nav="true" data-nav-speed="false" data-mobile-device="1" data-mobile-device-nav="false" data-mobile-device-dots="false" data-ipad-device="1" data-ipad-device-nav="false" data-ipad-device-dots="false" data-ipad-device2="1" data-ipad-device-nav2="false" data-ipad-device-dots2="false" data-md-device="1" data-md-device-nav="true" data-md-device-dots="false">
                    
                    
                <div class="owl-stage-outer">
                    <div class="owl-stage" >
                        <div class="owl-item cloned" style="width: 430px; margin-right: 30px;">
                            <div class="items">
                                <a href="#">
                                    
                                    <div class="teams">
                                        <div class="logo">
                                            <img class="size-80" src="images/team/1.png" alt="Man City">
                                            <div class="name">{{$match->equipea}}</div>
                                        </div>
                                        <div class="time-vs">
                                            <span class="time primary-color">VS</span>
                                        </div>
                                        <div class="logo">
                                            <img class="size-80" src="images/team/2.png" alt="Arsenal">
                                            <div class="name">{{$match->equipeb}}</div>
                                        </div>
                                    </div>
                                    <div class="vanues">
                                        <div class="stadium"><span>Stade:</span>{{$match->stade}}</div>
                                    </div>
                                </a>
                            </div>
                        </div>
                        
                       
                    
                
                </div>
        </div>
        <div class="owl-controls"><div class="owl-nav"><div class="owl-prev" style="display: none;"><i class="fa fa-angle-left"></i></div><div class="owl-next" style="display: none;"><i class="fa fa-angle-right"></i></div></div><div class="owl-dots" style="display: none;"></div></div></div>
            </div>
            
            <div class="rs-pointtable style3 pt-20 pb-30 md-pt-0 md-pb-80">
                <div class="container">
                    <div class="point-table-wrap">
                        <table>
                            @foreach ($pronostiques as $pronostique)
                            <tbody>
                                <tr>
                                    <th>{{$pronostique->intitule}}</th>
                                </tr>
                                <?php 
                                $choices= Choix::getAllChoix(['choix.idprono'=> $pronostique->idprono]);
                                ?>
                                @foreach ($choices as $choice)
                                <tr class="accordion-toggle" style="cursor: pointer;" onclick="viewmodal('{{$pronostique->intitule}}','{{$choice->cote}}','{{$choice->idchoix}}','{{$choice->nom}}')">
                                    <td class="dark">o</td>
                                    <td class="dark">{{$choice->nom}}</td>
                                    <th class="red">{{$choice->cote}}</th>
                                </tr>
                                @endforeach
                            </tbody>
                            @endforeach
                        </table>
                    </div>
                </div>
            </div>
            
            
            
            <div id="collapseOne" class="" style="z-index: 10000; position: fixed; top: 0;left: 0; width: 100%; height: 100%;background-color: rgba(0, 0, 0, 0.5); display: none">
                <div class="card-body bg-light" style="position: absolute;
                top: 50%;
                left: 50%;
                transform: translate(-50%, -50%);
                width: 400px;
                padding: 20px;">
                    <span class="close" onclick="document.getElementById('collapseOne').style.display='none'">&times;</span>
                    <p>effectuez un Pari</p>
                    <form action="{{url('parier')}}" method="post">
                        @csrf
                        <div class="row">
                            <div class="col-lg-6" id="intitle"></div>
                        <div class="col-lg-6">Cote</div>
                    </div>
                    <div class="row">
                        <div class="col-lg-6" id="nom"></div>
                        <div class="col-lg-6" id="cote"></div>
                    </div>
                    <div class="row pt-20">
                        <div class="coupon-code-input  col-lg-12">
                            <input type="number" id="montant" class="form-control" name="montant" placeholder="montant" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-6"></div>
                        <div class="col-lg-6">Gain potentiel: <span id="gainpot" class="text-success"></span>€</div>
                    </div>
                    <input type="hidden" name="choix" id="choix" required>
                    <input type="hidden" name="gain" id="gain" required>
                    <br>
                    <button class="readon" type="submit">parier</button>
                </form>
                </div>
            </div>
            
            
            <!-- Subscribe Section Start -->
            
            <!-- Subscribe Section End -->
        </div>
    </div>
    <!-- Single Club Section End -->
@stop
@section('script')
    <script>
        
        function viewmodal(intitle, cote, choix, nom){
            $('#intitle').text(intitle);
            $('#cote').text(cote);
            $('#nom').text(nom);
            $('#choix').val(choix);
            $('#collapseOne').css('display','block');
        }

        $('#montant').keyup(function(){
            let gain=$(this).val()*$('#cote').text();
            $('#gainpot').text(gain);
            $('#gain').val(gain);
        })

    </script>
@stop
    