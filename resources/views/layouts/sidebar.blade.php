<div class="sidebar" data-active-color="rose" data-background-color="black" data-image="../assets/img/sidebar-1.jpg">
           
                    <div class="logo">
                        <a href="http://www.creative-tim.com" class="simple-text logo-mini">
                            
                        </a>
                        <a href="{{ route('user.index') }}" class="simple-text logo-normal">
                            Thuê xe khách
                        </a>
                    </div>
                    <div class="sidebar-wrapper">
                        <div class="user">
                            <div class="photo">
                                {{-- <img src="../assets/img/faces/avatar.jpg" /> --}}
                            </div>
                            <div class="info">
                                <a data-toggle="collapse" href="#collapseExample" class="collapsed">
                                    <span>
                                        {{ Session::get('fullName') }}
                                        <b class="caret"></b>
                                    </span>
                                </a>
                                <div class="clearfix"></div>
                                <div class="collapse" id="collapseExample">
                                    <ul class="nav">
                                        <li>
                                            <a href="{{ route('profile') }}">
                                                <i class="material-icons">account_circle</i>
                                                <span class="sidebar-normal"> My Profile </span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="{{ route('editPass') }}">
                                                <i class="material-icons">keys</i>
                                                <span class="sidebar-normal"> Change Password </span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="{{ route('logout') }}">
                                                <i class="material-icons">logout</i>
                                                <span class="sidebar-normal"> Logout </span>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <ul class="nav">
                            
                            <li >
                                <a href="{{ route('user.index') }}">
                                    <i class="material-icons">person</i>
                                    <p> User </p>
                                </a>
                            </li>
                            <li>
                                <a  href="{{ route('driver.index') }}">
                                    <i class="material-icons">commute</i>
                                    <p> Driver </p>
                                </a>
                            </li>
                            <li>
                                <a  href="{{ route('bus.index') }}">
                                    <i class="material-icons">king_bed</i>
                                    <p> Bus </p>
                                </a>
                            </li>
                            <li>
                                <a  href="{{ route('garage.index') }}">
                                    <i class="material-icons">maps_home_work</i>
                                    <p> Garage </p>
                                </a>
                            </li>
                            <li>
                                <a  href="{{ route('travel-schedule.index') }}">
                                    <i class="material-icons">list</i>
                                    <p> Travel Schedule </p>
                                </a>
                            </li>
                            
                            <li>
                                <a data-toggle="collapse" href="#bookingExamples">
                                    <i class="material-icons">apps</i>
                                    <p> Booking 
                                        <span style="color: #f44336">
                                           {{ $count_booking }}
                                        </span>
                                        <b class="caret"></b>
                                    </p>
                                </a>
                                <div class="collapse" id="bookingExamples">
                                    <ul class="nav">
                                        <li>
                                            <a href="{{ route('check-booking.index') }}">
                                                <span class="sidebar-mini"> C </span>
                                                <span class="sidebar-normal"> Check </span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="{{ route('unchecked-booking.index') }}">
                                                <span class="sidebar-mini"> UC </span>
                                                <span class="sidebar-normal"> Unchecked 
                                                    <span style="color: #f44336">
                                                        {{ $count_booking}}
                                                    </span>
                                                </span>
                                                
                                                {{-- <span class="btn btn-danger">
                                                    @foreach($count as $c)
                                                    {{ $c->tongDon}}
                                                    @endforeach
                                                </span> --}}
                                            </a>
                                        </li>
                                        <li>
                                            <a href="{{ route('cancel-booking.index') }}">
                                                <span class="sidebar-mini"> CC </span>
                                                <span class="sidebar-normal"> Cancel </span>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </li>   
                            <li>
                                <a  href="{{ route('payment.index') }}">
                                    <i class="material-icons">payment</i>
                                    <p> Payment </p>
                                </a>
                            </li>
                            <li>
                                <a  href="{{ route('statisticals-revenue') }}">
                                    <i class="material-icons">assessment</i>
                                    <p> Statisticals </p>
                                </a>
                            </li>
                            {{-- <li>
                                <a data-toggle="collapse" href="#formsExamples">
                                    <i class="material-icons">trending_up</i>
                                    <p> Statisticals
                                        <b class="caret"></b>
                                    </p>
                                </a>
                                <div class="collapse" id="formsExamples">
                                    <ul class="nav">
                                        <li>
                                            <a href="{{ route('statisticals-user') }}">
                                                <span class="sidebar-mini"> US </span>
                                                <span class="sidebar-normal"> User </span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="{{ route('statisticals-driver') }}">
                                                <span class="sidebar-mini"> DV </span>
                                                <span class="sidebar-normal"> Driver </span>
                                            </a>
                                        </li>
                                        
                                        <li>
                                            <a href="{{ route('statisticals-garage') }}">
                                                <span class="sidebar-mini"> GR   </span>
                                                <span class="sidebar-normal"> Garage </span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="{{ route('statisticals-revenue') }}">
                                                <span class="sidebar-mini"> RV   </span>
                                                <span class="sidebar-normal"> Revenue </span>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </li> --}}
                        </ul>
                    </div>
                </div>