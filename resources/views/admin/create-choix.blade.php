
@extends('layouts.admindash')

@section('content')
        <div class="rs-contact">

            <div class="contact-part sec-bg pt-100 pb-100 md-pt-80 md-pb-80">
                <div class="container">
                    <div class="row">
                        
                        <div class="col-lg-6 pl-50 md-pl-15">
                            <div class="contact-area">
                                <div class="title-style mb-50">
                                    <h2 class="margin-0 uppercase">Creer un Choix</h2>
                                    <span class="line-bg left-line pt-10 y-b"></span>
                                </div>
                                <div id="form-messages"></div>
                                <form id="contact-form" class="contact-form" method="post" action="{{url('admin/choix/store')}}">
                                @csrf
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="from-control">
                                                <input name="name" type="text" placeholder="intitulé" id="" required="required">
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="from-control">
                                                <input name="cote" type="number" placeholder="cote" id="" required="required">
                                            </div>
                                        </div>
                                        
                                        <div class="col-lg-12">
                                            <div class="from-control">
                                                <select name="match" id="match" class="form-control pt-10 pb-10">
                                                    <option>Choississez le match</option>
                                                    @foreach ($matchs as $match)
                                                    <option value="{{$match->idmatch}}">{{$match->equipea}} VS {{$match->equipeb}}</option>
                                                        
                                                    @endforeach
                                                    
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <div class="from-control">
                                                <select name="pronostique" id="pronostique" class="form-control pt-10 pb-10">
                                                    <option>Choississez le pronostique</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="submit-btn">
                                        <button class="readon" type="submit">Enregistrer</button>
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
                                                <th class="product-thumbnail"></th>
                                                <th class="product-name">nom</th>
                                                <th class="product-quantity">Date création</th>
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

@section('script')
        <script>
            $('#match').change(function(){
                $.ajax({
                    url: "{{url('getpronosbymatch')}}",
                    method: 'get',
                    data: {
                        match: $(this).val(),
                    },
                    success: function(data){
                        $('#pronostique').empty();
                            $.each(data, function(index){
                                let line='<option value="'+ data[index].idprono +'">'+data[index].intitule+'</option>';
                                $('#pronostique').append(line);
                            });
                        
                    }
                });
            });
        </script>

@stop