<?php
include 'header.php'; 
?>

<?php echo $loader; ?>
<?php echo $success; ?>
<?php echo $post_description_panel; ?>
<?php echo $header; ?>

<!DOCTYPE html> 

        <input type="hidden" id="logged_user" value="<?php echo $userloggedin; ?>">
        <div id="app_tab1" class="col s12">
            <div class="container_main">

                <div class="container_filters hide-on-med-and-down">
                    <div class="container_ads_space">
                        <img rel="preload" src="resources/img/info/ads.svg" alt="advert">
                    </div>
                    <div class="div_filters">
                        <form class="" id="filter_radio">
                            <div class="filter_title">
                                <p>Filtros</p>
                            </div>
                            <div class="divider"></div>

                            <div class="div_filter_block">
                                <div class="row ">
                                    <p class="left">Preço</p>
                                </div>
                               
                                <p>
                                <label>
                                    <input class="with-gap" onchange="loadPosts('')" name="radio_price" id="radio_price1" value="0" type="radio" checked/>
                                    <span>Todos</span>
                                </label>
                                </p>
                                <p>
                                <label>
                                    <input class="with-gap" onchange="loadPosts('')" name="radio_price" id="radio_price2" value="1" type="radio"  />
                                    <span>100 Mts - 999 Mts</span>
                                </label>
                                </p>
                                <p>
                                <label>
                                    <input class="with-gap" onchange="loadPosts('')" name="radio_price" id="radio_price3" value="2" type="radio" />
                                    <span>1000 Mts - 9 999 Mts</span>
                                </label>
                                </p>
                                <p>
                                <label>
                                    <input class="with-gap" onchange="loadPosts('')" name="radio_price" id="radio_price4" value="3" type="radio"  />
                                    <span>10 000 Mts - 99 999 Mts</span>
                                </label>
                                </p>
                                <p>
                                <label>
                                    <input class="with-gap" onchange="loadPosts('')" name="radio_price" id="radio_price5" value="4" type="radio" />
                                    <span>100 000 Mts +</span>
                                </label>
                                </p>

                            </div>

                            <div class="divider"></div>

                            <div class="div_filter_block">
                                <div class="row ">
                                    <p class="left">Estado do item</p>
                                </div>
                               
                                <p>
                                <label>
                                    <input class="with-gap" onchange="loadPosts('')" name="radio_status" id="radio_status1" value="0" type="radio" checked />
                                    <span>Todos</span>
                                </label>
                                </p>
                                <p>
                                <label>
                                    <input class="with-gap" onchange="loadPosts('')" name="radio_status" id="radio_status2" value="1" type="radio"  />
                                    <span>Novo/a</span>
                                </label>
                                </p>
                                <p>
                                <label>
                                    <input class="with-gap" onchange="loadPosts('')" name="radio_status" id="radio_status3" value="2" type="radio" />
                                    <span>Usado - boas condições</span>
                                </label>
                                </p>
                                <p>
                                <label>
                                    <input class="with-gap" onchange="loadPosts('')" name="radio_status" id="radio_status4" value="3" type="radio"  />
                                    <span>Usado - com defeitos</span>
                                </label>
                                </p>     


                            </div>
                            <div class="divider"></div>

                            <div class="div_filter_block">
                                <div class="row ">
                                    <p class="left">Entregas</p>
                                </div>
                                
                                <p>
                                <label>
                                    <input class="with-gap" onchange="loadPosts('')" name="radio_delivery" id="radio_delivery1" value="0" type="radio" checked />
                                    <span>Todos</span>
                                </label>
                                </p><p>
                                <label>
                                    <input class="with-gap" onchange="loadPosts('')" name="radio_delivery" id="radio_delivery2" value="1" type="radio"  />
                                    <span>Faz entrega</span>
                                </label>
                                </p>
                                <p>
                                <label>
                                    <input class="with-gap" onchange="loadPosts('')" name="radio_delivery" id="radio_delivery2" value="2" type="radio"  />
                                    <span>Não faz entregas</span>
                                </label>
                                </p>               
                                
                            </div>

                        </form>

                    </div>
                </div>

                <div class="container_main_content" id="container_main_content">

                    <div class="container_sorting left hide-on-med-and-down">
                        <ul>
                            <li><span>Alfabeto</span> <a class="btn_sort tooltipped" onclick="loadPosts('atoz')" data-position="top" data-tooltip="A - Z"><i class="material-icons">arrow_downward</i> </a><a class="btn_sort tooltipped" onclick="loadPosts('ztoa')"  data-position="top" data-tooltip="Z - A"><i class="material-icons">arrow_upward</i> </a></li> |

                            <li><span>Data publicada</span> <a class="btn_sort tooltipped" onclick="loadPosts('newest')" data-position="top" data-tooltip="Recentes"><i class="material-icons">arrow_downward</i> </a><a class="btn_sort tooltipped" onclick="loadPosts('oldest')" data-position="top" data-tooltip="Mais antigas"><i class="material-icons">arrow_upward</i> </a></li> |

                            <li><span>Popularidade</span> <a class="btn_sort tooltipped" onclick="loadPosts('mostpopular')" data-position="top" data-tooltip="Populares"><i class="material-icons">arrow_downward</i> </a><a class="btn_sort tooltipped" onclick="loadPosts('leastpopular')" data-position="top" data-tooltip="Menos popular"><i class="material-icons">arrow_upward</i> </a></li> |

                            <li><span>Preço</span> <a class="btn_sort tooltipped" onclick="loadPosts('hightolow')" data-position="top" data-tooltip="Mais caros - Mais barato"><i class="material-icons">arrow_downward</i> </a><a class="btn_sort tooltipped" onclick="loadPosts('lowtohigh')" data-position="top" data-tooltip="Mais barato - Mais caro"><i class="material-icons">arrow_upward</i> </a></li>
                        </ul>
                    </div>

                    <div class="hide-on-large-only hide-on-extra-large-only container_sort_mobile">
                        <button data-target="slide-out_filter" class="filter_btn sidenav-trigger">
                            Filtros 
                            <i class="material-icons right">filter_list</i>
                        </button>
                        <button data-target="slide-out_sort" class="filter_btn sidenav-trigger">
                            Ordem
                            <i class="material-icons right">sort</i>
                        </button>

                        <div id="slide-out_filter" class="sidenav">
                            
                                <div class="div_filters">
                                    <form class="">
                                        
                                        <div class="div_filter_block">
                                            <div class="row ">
                                                <p class="left">Preço</p>
                                            </div>
                                        
                                            <p>
                                            <label>
                                                <input class="with-gap" onchange="loadPostsMobile('')" name="radio_price1" id="radio_price1" value="" type="radio" checked/>
                                                <span>Todos</span>
                                            </label>
                                            </p>
                                            <p>
                                            <label>
                                                <input class="with-gap" onchange="loadPostsMobile('')" name="radio_price1" id="radio_price2" value="1" type="radio"  />
                                                <span>100 Mts - 999 Mts</span>
                                            </label>
                                            </p>
                                            <p>
                                            <label>
                                                <input class="with-gap" onchange="loadPostsMobile('')" name="radio_price1" id="radio_price3" value="2" type="radio" />
                                                <span>1000 Mts - 9 999 Mts</span>
                                            </label>
                                            </p>
                                            <p>
                                            <label>
                                                <input class="with-gap" onchange="loadPostsMobile('')" name="radio_price1" id="radio_price4" value="3" type="radio"  />
                                                <span>10 000 Mts - 99 999 Mts</span>
                                            </label>
                                            </p>
                                            <p>
                                            <label>
                                                <input class="with-gap" onchange="loadPostsMobile('')" name="radio_price1" id="radio_price5" value="4" type="radio" />
                                                <span>100 000 Mts +</span>
                                            </label>
                                            </p>

                                        </div>

                                        <div class="divider"></div>

                                        <div class="div_filter_block">
                                            <div class="row ">
                                                <p class="left">Estado do item</p>
                                            </div>
                                        
                                            <p>
                                            <label>
                                                <input class="with-gap" onchange="loadPostsMobile('')" name="radio_status1" id="radio_status1" value="" type="radio" checked />
                                                <span>Todos</span>
                                            </label>
                                            </p>
                                            <p>
                                            <label>
                                                <input class="with-gap" onchange="loadPostsMobile('')" name="radio_status1" id="radio_status2" value="1" type="radio"  />
                                                <span>Novo/a</span>
                                            </label>
                                            </p>
                                            <p>
                                            <label>
                                                <input class="with-gap" onchange="loadPostsMobile('')" name="radio_status1" id="radio_status3" value="2" type="radio" />
                                                <span>Usado - boas condições</span>
                                            </label>
                                            </p>
                                            <p>
                                            <label>
                                                <input class="with-gap" onchange="loadPostsMobile('')" name="radio_status1" id="radio_status4" value="3" type="radio"  />
                                                <span>Usado - com defeitos</span>
                                            </label>
                                            </p>     


                                        </div>
                                        <div class="divider"></div>

                                        <div class="div_filter_block">
                                            <div class="row ">
                                                <p class="left">Entregas</p>
                                            </div>
                                            
                                            <p>
                                            <label>
                                                <input class="with-gap" onchange="loadPostsMobile('')" name="radio_delivery1" id="radio_delivery1" value="" type="radio" checked />
                                                <span>Todos</span>
                                            </label>
                                            </p><p>
                                            <label>
                                                <input class="with-gap" onchange="loadPostsMobile('')" name="radio_delivery1" id="radio_delivery2" value="1" type="radio"  />
                                                <span>Faz entrega</span>
                                            </label>
                                            </p>
                                            <p>
                                            <label>
                                                <input class="with-gap" onchange="loadPostsMobile('')" name="radio_delivery1" id="radio_delivery2" value="2" type="radio"  />
                                                <span>Não faz entregas</span>
                                            </label>
                                            </p>               
                                            
                                        </div>

                                    </form>

                                </div>
                        </div>

                        <div id="slide-out_sort" class="sidenav">
                           
                            <ul class="mobile_filter_list">
                                <li>
                                    <span>Alfabeto</span> 
                                    <div class="filter_list_btns">
                                        <a class="btn_sort_mobile tooltipped" onclick="loadPostsMobile('atoz')" data-position="top" data-tooltip="A - Z">A - Z </a>
                                        
                                        <a class="btn_sort_mobile tooltipped" onclick="loadPostsMobile('ztoa')"  data-position="top" data-tooltip="Z - A">Z - A </a>
                                    </div>
                                </li>
                                <div class="divider"></div>
                                <li>
                                    <span>Data publicada</span> 
                                    <div class="filter_list_btns">
                                        <a class="btn_sort_mobile tooltipped" onclick="loadPostsMobile('newest')" data-position="top" data-tooltip="Recentes">Recentes </a>
                                        
                                        <a class="btn_sort_mobile tooltipped" onclick="loadPostsMobile('oldest')" data-position="top" data-tooltip="Mais antigas">Mais antigas </a>
                                    </div>
                                </li> 
                                <div class="divider"></div>
                                <li>
                                    <span>Popularidade</span> 
                                    <div class="filter_list_btns">
                                        <a class="btn_sort_mobile tooltipped" onclick="loadPostsMobile('mostpopular')" data-position="top" data-tooltip="Populares">Mais populares </a>
                                        
                                        <a class="btn_sort_mobile tooltipped" onclick="loadPostsMobile('leastpopular')" data-position="top" data-tooltip="Menos popular">Menos populares </a>
                                    </div>
                                </li>
                                <div class="divider"></div>
                                <li>
                                    <span>Preço</span> 
                                    <div class="filter_list_btns">
                                        <a class="btn_sort_mobile tooltipped" onclick="loadPostsMobile('hightolow')" data-position="top" data-tooltip="Mais caros - Mais barato">Mais caro </a>
                                        
                                        <a class="btn_sort_mobile tooltipped" onclick="loadPostsMobile('lowtohigh')" data-position="top" data-tooltip="Mais barato - Mais caro">Menos caro </a>
                                    </div>
                                </li>

                            </ul>
                        </div>
                    </div>
                  

                    <div class="container_banner">
                        <img rel="preload" src="resources/img/info/banner.svg" alt="banner">
                    </div>

                    <div class="container_results" id="container_results">
                                            
                        <div class="container_default_view" id="container_no_item">
                            <img rel="preload" src="resources/img/info/search.svg" alt="no item found">
                            <h4>Nenhum item encontrado</h4>
                        </div>

                        
                    </div>
                    <div class="container_posts_info" id="container_posts_info">
                        <p style="font-size: 80%;" id="nomoreposts" ></p>
                        <button class="load_more_btn btn center" type="button" id="loadmore" onclick="loadPostsMore('')" value="Mostrar mais "><i class="material-icons">refresh</i> </button>

                        <button class="load_more_btn_mobile btn center" type="button" id="loadmoreMobile" onclick="loadPostsMoreMobile('')" value="Mostrar mais "><i class="material-icons">refresh</i> </button>

                    </div>
                </div>                    
                   

            </div>
        </div>

        <div id="app_tab2" class="col s12">
            <div class="container_main">

                <div class="container_filters hide-on-med-and-down">
                    <div class="container_ads_space">
                        <img rel="preload" src="resources/img/info/ads.svg" alt="advert">
                    </div>
                    <div class="div_filters">
                        <form class="" id="filter_radio">
                            <div class="filter_title">
                                <p>Filtros</p>
                            </div>
                            <div class="divider"></div>

                            <div class="div_filter_block">
                                <div class="row ">
                                    <p class="left">Preço</p>
                                </div>
                            
                                <p>
                                <label>
                                    <input class="with-gap" onchange="loadBoladas('')" name="radio_price_b" id="radio_price1_b" value="0" type="radio" checked/>
                                    <span>Todos</span>
                                </label>
                                </p>
                                <p>
                                <label>
                                    <input class="with-gap" onchange="loadBoladas('')" name="radio_price_b" id="radio_price2" value="1" type="radio"  />
                                    <span>100 Mts - 999 Mts</span>
                                </label>
                                </p>
                                <p>
                                <label>
                                    <input class="with-gap" onchange="loadBoladas('')" name="radio_price_b" id="radio_price3" value="2" type="radio" />
                                    <span>1000 Mts - 9 999 Mts</span>
                                </label>
                                </p>
                                <p>
                                <label>
                                    <input class="with-gap" onchange="loadBoladas('')" name="radio_price_b" id="radio_price4" value="3" type="radio"  />
                                    <span>10 000 Mts - 99 999 Mts</span>
                                </label>
                                </p>
                                <p>
                                <label>
                                    <input class="with-gap" onchange="loadBoladas('')" name="radio_price_b" id="radio_price5" value="4" type="radio" />
                                    <span>100 000 Mts +</span>
                                </label>
                                </p>

                            </div>

                            <div class="divider"></div>

                            <div class="div_filter_block">
                                <div class="row ">
                                    <p class="left">Estado do item</p>
                                </div>
                            
                                <p>
                                <label>
                                    <input class="with-gap" onchange="loadBoladas('')" name="radio_status_b" id="radio_status1" value="0" type="radio" checked />
                                    <span>Todos</span>
                                </label>
                                </p>
                                <p>
                                <label>
                                    <input class="with-gap" onchange="loadBoladas('')" name="radio_status_b" id="radio_status2" value="1" type="radio"  />
                                    <span>Novo/a</span>
                                </label>
                                </p>
                                <p>
                                <label>
                                    <input class="with-gap" onchange="loadBoladas('')" name="radio_status_b" id="radio_status3" value="2" type="radio" />
                                    <span>Usado - boas condições</span>
                                </label>
                                </p>
                                <p>
                                <label>
                                    <input class="with-gap" onchange="loadBoladas('')" name="radio_status_b" id="radio_status4" value="3" type="radio"  />
                                    <span>Usado - com defeitos</span>
                                </label>
                                </p>     


                            </div>
                            <div class="divider"></div>

                            <div class="div_filter_block">
                                <div class="row ">
                                    <p class="left">Entregas</p>
                                </div>
                                
                                <p>
                                <label>
                                    <input class="with-gap" onchange="loadBoladas('')" name="radio_delivery_b" id="radio_delivery1" value="0" type="radio" checked />
                                    <span>Todos</span>
                                </label>
                                </p><p>
                                <label>
                                    <input class="with-gap" onchange="loadBoladas('')" name="radio_delivery_b" id="radio_delivery2" value="1" type="radio"  />
                                    <span>Faz entrega</span>
                                </label>
                                </p>
                                <p>
                                <label>
                                    <input class="with-gap" onchange="loadBoladas('')" name="radio_delivery_b" id="radio_delivery2" value="2" type="radio"  />
                                    <span>Não faz entregas</span>
                                </label>
                                </p>               
                                
                            </div>

                        </form>

                    </div>
                </div>

                <div class="container_main_content" id="container_main_content">

                    <div class="container_sorting left hide-on-med-and-down">
                        <ul>
                            <li><span>Alfabeto</span> <a class="btn_sort tooltipped" onclick="loadBoladas('atoz')" data-position="top" data-tooltip="A - Z"><i class="material-icons">arrow_downward</i> </a><a class="btn_sort tooltipped" onclick="loadBoladas('ztoa')"  data-position="top" data-tooltip="Z - A"><i class="material-icons">arrow_upward</i> </a></li> |

                            <li><span>Data publicada</span> <a class="btn_sort tooltipped" onclick="loadBoladas('newest')" data-position="top" data-tooltip="Recentes"><i class="material-icons">arrow_downward</i> </a><a class="btn_sort tooltipped" onclick="loadBoladas('oldest')" data-position="top" data-tooltip="Mais antigas"><i class="material-icons">arrow_upward</i> </a></li> |

                            <li><span>Popularidade</span> <a class="btn_sort tooltipped" onclick="loadBoladas('mostpopular')" data-position="top" data-tooltip="Populares"><i class="material-icons">arrow_downward</i> </a><a class="btn_sort tooltipped" onclick="loadBoladas('leastpopular')" data-position="top" data-tooltip="Menos popular"><i class="material-icons">arrow_upward</i> </a></li> |

                            <li><span>Preço</span> <a class="btn_sort tooltipped" onclick="loadBoladas('hightolow')" data-position="top" data-tooltip="Mais caros - Mais barato"><i class="material-icons">arrow_downward</i> </a><a class="btn_sort tooltipped" onclick="loadBoladas('lowtohigh')" data-position="top" data-tooltip="Mais barato - Mais caro"><i class="material-icons">arrow_upward</i> </a></li>
                        </ul>
                    </div>

                    <div class="hide-on-large-only hide-on-extra-large-only container_sort_mobile">
                        <button data-target="slide-out_filter_b" class="filter_btn sidenav-trigger waves-effect waves-light">
                            Filtros 
                            <i class="material-icons right">filter_list</i>
                        </button>
                        <button data-target="slide-out_sort_b" class="filter_btn sidenav-trigger waves-effect waves-light">
                            Ordem
                            <i class="material-icons right">sort</i>
                        </button>

                        <div id="slide-out_filter_b" class="sidenav">
                            <div class="container_ads_space">
                                <img rel="preload" src="resources/img/info/ads.svg" alt="advert">
                            </div>
                                <div class="div_filters">
                                    <form class="">
                                        <div class="filter_title">
                                            <p>Filtros</p>
                                        </div>
                                        <div class="divider"></div>

                                        <div class="div_filter_block">
                                            <div class="row ">
                                                <p class="left">Preço</p>
                                            </div>
                                        
                                            <p>
                                            <label>
                                                <input class="with-gap" onchange="loadBoladasMobile('')" name="radio_price1_b" id="radio_price1_b" value="" type="radio" checked/>
                                                <span>Todos</span>
                                            </label>
                                            </p>
                                            <p>
                                            <label>
                                                <input class="with-gap" onchange="loadBoladasMobile('')" name="radio_price1_b" id="radio_price2_b" value="1" type="radio"  />
                                                <span>100 Mts - 999 Mts</span>
                                            </label>
                                            </p>
                                            <p>
                                            <label>
                                                <input class="with-gap" onchange="loadBoladasMobile('')" name="radio_price1_b" id="radio_price3_b" value="2" type="radio" />
                                                <span>1000 Mts - 9 999 Mts</span>
                                            </label>
                                            </p>
                                            <p>
                                            <label>
                                                <input class="with-gap" onchange="loadBoladasMobile('')" name="radio_price1_b" id="radio_price4_b" value="3" type="radio"  />
                                                <span>10 000 Mts - 99 999 Mts</span>
                                            </label>
                                            </p>
                                            <p>
                                            <label>
                                                <input class="with-gap" onchange="loadBoladasMobile('')" name="radio_price1_b" id="radio_price5_b" value="4" type="radio" />
                                                <span>100 000 Mts +</span>
                                            </label>
                                            </p>

                                        </div>

                                        <div class="divider"></div>

                                        <div class="div_filter_block">
                                            <div class="row ">
                                                <p class="left">Estado do item</p>
                                            </div>
                                        
                                            <p>
                                            <label>
                                                <input class="with-gap" onchange="loadBoladasMobile('')" name="radio_status1_b" id="radio_status1" value="" type="radio" checked />
                                                <span>Todos</span>
                                            </label>
                                            </p>
                                            <p>
                                            <label>
                                                <input class="with-gap" onchange="loadBoladasMobile('')" name="radio_status1_b" id="radio_status2" value="1" type="radio"  />
                                                <span>Novo/a</span>
                                            </label>
                                            </p>
                                            <p>
                                            <label>
                                                <input class="with-gap" onchange="loadBoladasMobile('')" name="radio_status1_b" id="radio_status3" value="2" type="radio" />
                                                <span>Usado - boas condições</span>
                                            </label>
                                            </p>
                                            <p>
                                            <label>
                                                <input class="with-gap" onchange="loadBoladasMobile('')" name="radio_status1_b" id="radio_status4" value="3" type="radio"  />
                                                <span>Usado - com defeitos</span>
                                            </label>
                                            </p>     


                                        </div>
                                        <div class="divider"></div>

                                        <div class="div_filter_block">
                                            <div class="row ">
                                                <p class="left">Entregas</p>
                                            </div>
                                            
                                            <p>
                                            <label>
                                                <input class="with-gap" onchange="loadBoladasMobile('')" name="radio_delivery1_b" id="radio_delivery1" value="" type="radio" checked />
                                                <span>Todos</span>
                                            </label>
                                            </p><p>
                                            <label>
                                                <input class="with-gap" onchange="loadBoladasMobile('')" name="radio_delivery1_b" id="radio_delivery2" value="1" type="radio"  />
                                                <span>Faz entrega</span>
                                            </label>
                                            </p>
                                            <p>
                                            <label>
                                                <input class="with-gap" onchange="loadBoladasMobile('')" name="radio_delivery1_b" id="radio_delivery2" value="2" type="radio"  />
                                                <span>Não faz entregas</span>
                                            </label>
                                            </p>               
                                            
                                        </div>

                                    </form>

                                </div>
                        </div>

                        <div id="slide-out_sort_b" class="sidenav">
                            <div class="container_ads_space">
                                <img rel="preload" src="resources/img/info/ads.svg" alt="advert">
                            </div>
                            <ul class="mobile_filter_list">
                                <li>
                                    <span>Alfabeto</span> 
                                    <div class="filter_list_btns">
                                        <a class="btn_sort_mobile tooltipped" onclick="loadBoladasMobile('atoz')" data-position="top" data-tooltip="A - Z">A - Z </a>
                                        
                                        <a class="btn_sort_mobile tooltipped" onclick="loadBoladasMobile('ztoa')"  data-position="top" data-tooltip="Z - A">Z - A </a>
                                    </div>
                                </li>
                                <div class="divider"></div>
                                <li>
                                    <span>Data publicada</span> 
                                    <div class="filter_list_btns">
                                        <a class="btn_sort_mobile tooltipped" onclick="loadBoladasMobile('newest')" data-position="top" data-tooltip="Recentes">Recentes </a>
                                        
                                        <a class="btn_sort_mobile tooltipped" onclick="loadBoladasMobile('oldest')" data-position="top" data-tooltip="Mais antigas">Mais antigas </a>
                                    </div>
                                </li> 
                                <div class="divider"></div>
                                <li>
                                    <span>Popularidade</span> 
                                    <div class="filter_list_btns">
                                        <a class="btn_sort_mobile tooltipped" onclick="loadBoladasMobile('mostpopular')" data-position="top" data-tooltip="Populares">Mais populares </a>
                                        
                                        <a class="btn_sort_mobile tooltipped" onclick="loadBoladasMobile('leastpopular')" data-position="top" data-tooltip="Menos popular">Menos populares </a>
                                    </div>
                                </li>
                                <div class="divider"></div>
                                <li>
                                    <span>Preço</span> 
                                    <div class="filter_list_btns">
                                        <a class="btn_sort_mobile tooltipped" onclick="loadBoladasMobile('hightolow')" data-position="top" data-tooltip="Mais caros - Mais barato">Mais caro </a>
                                        
                                        <a class="btn_sort_mobile tooltipped" onclick="loadBoladasMobile('lowtohigh')" data-position="top" data-tooltip="Mais barato - Mais caro">Menos caro </a>
                                    </div>
                                </li>

                            </ul>
                        </div>
                    </div>
                

                    <div class="container_banner">
                        <img rel="preload" src="resources/img/info/banner_boladas.svg" alt="banner">
                    </div>

                    <div class="container_results" id="container_results_b">
                                            
                        <div class="container_default_view" id="container_no_item_b">
                            <img rel="preload" src="resources/img/info/search.svg" alt="no item found">
                            <h4>Nenhum item encontrado</h4>
                        </div>

                        
                    </div>
                    <div class="container_posts_info" id="container_posts_info">
                        <p style="font-size: 80%;" id="nomoreposts_b" ></p>
                        <button class="load_more_btn btn center" type="button" id="loadmore_b" onclick="loadBoladasMore('')" value="Mostrar mais "><i class="material-icons">refresh</i> </button>

                        <button class="load_more_btn_mobile btn center" type="button" id="loadmoreMobile_b" onclick="loadBoladasMoreMobile('')" value="Mostrar mais "><i class="material-icons">refresh</i> </button>

                    </div>
                </div>                    
                

            </div>
        </div>

        <div id="app_tab3" class="col s12"><p>app_tab 3</p></div>

        <div id="app_tab4" class="col s12"><p>app_tab 4</p></div>


        <div class="row fixed_tabs">
            <div class="col s12">
                <ul class="tabs tabs-fixed-width tab-demo z-depth-1">


                    <li class="tab">
                        <a class="active full_name_query" href="#app_tab1" class="">
                            <div class="valign-wrapper center">
                                <span class="hide-on-small-and-down">Rapidas</span> <i class="material-icons right">timer</i>
                            </div>
                        </a>
                    </li>


                    <li class="tab <?php echo $disable; ?>">
                        <a class="full_name_query" href="#app_tab2">
                            <div class="valign-wrapper center">
                                <span class="hide-on-small-and-down">Boladas</span> <i class="material-icons right">handshake</i>
                            </div>
                        </a>
                    </li>


                    <li class="tab <?php echo $disable; ?>">
                        <a class="full_name_query" href="#app_tab3">
                            <div class="valign-wrapper center">
                                <span class="hide-on-small-and-down">Alugar</span> <i class="material-icons right">cottage</i>
                            </div>
                        </a>
                    </li>


                    <li class="tab <?php echo $disable; ?>">
                        <a class="full_name_query" href="#app_tab4">
                            <div class=" valign-wrapper center">
                                <span class="hide-on-small-and-down">Desapego</span> <i class="material-icons right">volunteer_activism</i>
                            </div>
                        </a>
                    </li>


                </ul>
    
            </div>
        </div>


        
        <!-- handle fab and posting -->
        <?php
            if($seller == 'no')
            {
                ?>
                <div class="modal container_modal_new_post" id="modal_new_post">
                    <div class="modal-content valign-wrapper">
                        <div class="container_modal_content  valign-wrapper">
                            <div class="div_not_seller">
                                <div class="row">
                                    <img rel="preload" src="resources/img/info/erro_post.svg" alt="erro image">
                                </div>
                                <div class="row center">
                                    <p>
                                        Parece que ainda não ativou a funcionalidade <b>Boladas</b>! <br>
                                        Vá as definições da sua conta, ou clique no botão.
                                    </p>
                                </div>
                                <div class="row">
                                    <a class="modal-close center btn waves-effect waves-light">Cancelar</a>
                                    <button class="btn waves-effect waves-light" onclick="location.href='settings.php'">
                                        definições
                                        <i class="material-icons right">settings</i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <?php
            }
            else if($seller == 'yes')
            {
                ?>
                    <div class="modal" id="modal_new_post">
                        <div class="modal-content new_post_content" id="modal_content">
                            <div class="">
                                <div class="container_new_post">
                                   
                                    <div class="row user_info_row">
                                        <div class="user_info_row" id="inner">
                                            <img rel="preload" src="<?php echo $icon; ?> " alt="user image">
                                            <p><?php echo $full_name; echo $verified_icon ?> <br><span><?php echo $title; ?></span></p>
                                        </div>
                                        <div>
                                            <button id="post_dismiss" class="modal-close btn waves-effect waves-dark right">
                                                <i class="material-icons center">close</i>
                                            </button>
                                        </div>
                                        
                                    </div>

                                    <div class="container_new_post_inputs" id="container_new_post_inputs">
                                        <input type="hidden" id="userloggedin" value="<?php echo $userloggedin; ?>">

                                        <div class="row">
                                            <h5  style="max-width:205px">
                                                Cenas rapidas 
                                                <i class="material-icons left">timer</i>
                                            </h5>
                                        </div>

                                        <div id="rapidas">
                                            <form id="rapidas_form" enctype="multipart/form-data">
                                            <div class="container_category_container" id="container_category_container">
                                            <div class="row">
                                                <div class="file-field input-field">
                                                    <div class="btn">
                                                        <span>Fotos</span>
                                                        <input type="file" accept=".jpeg,.jpg,.png" limit ="3" id="prod_imgs" multiple>
                                                    </div>
                                                    <div class="file-path-wrapper">
                                                        <input class="file-path validate" readonly onchange="checkLabel()" type="text" placeholder="Escolha 3 imagens" id="img_prod_label">
                                                    </div>
                                                </div>
                                                <p id="error_msg" style="font-size:50%;margin: 2px 0 2px 40px; color:red;"></p>

                                            </div>


                                            <div class="row">
                                                <div class="input-field col s6">
                                                    <i class="material-icons prefix">category</i>
                                                    <input name="prod_name" id="prod_name" type="text" class="validate">
                                                    <label for="prod_name">Nome do item</label>
                                                </div>

                                                <div class="input-field col s6">
                                                    <i class="material-icons prefix">payments</i>
                                                    <input name="price" id="price" type="number" class="validate">
                                                    <label for="price">Preço / unidade</label>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="input-field col s6 m6">
                                                    <i class="material-icons prefix">pin_drop</i>
                                                    <select class="" id="location">
                                                        <option value="" disabled selected>Provincia</option>
                                                        <option value="1" >Maputo</option>
                                                        <option value="2" >Gaza</option>
                                                        <option value="3" >Inhambane</option>
                                                        <option value="4" >Manica</option>
                                                        <option value="5" >Sofala</option>
                                                        <option value="6" >Tete</option>
                                                        <option value="7" >Zambezia</option>
                                                        <option value="8" >Nampula</option>
                                                        <option value="9" >Cabo Delgado</option>
                                                        <option value="10" >Niassa</option>
                                                    </select>
                                                </div>
                                                <div class="input-field col s6 m6">
                                                    <i class="material-icons prefix">info</i>
                                                    <select class="" id="status">
                                                        <option value="" disabled selected>Estado do item</option>
                                                        <option value="1" >Novo</option>
                                                        <option value="2" >Usado - boas condições</option>
                                                        <option value="3" >Usado - com defeitos</option>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="row valign-wrapper">
                                                    <i style="font-size:100%;margin-left:0px;" class="material-icons prefix">local_shipping</i>
                                                    <span style="font-size:60%; margin-left: 25px; ">Faz entregas?</span>
                                                </div>
                                                
                                                <div class="switch deliver_switch">
                                                    <label>
                                                    Não
                                                    <input id="deliver" type="checkbox">
                                                    <span class="lever"></span>
                                                    Sim
                                                    </label>
                                                </div>
                                            </div>

                                            <div class="row container_post_btn">
                                                <p id="error_msg2" style="font-size:50%;margin: 10px 0 10px 0px; color:red;"></p>
                                                <button type="button" class="btn waves-effect waves-dark" id="submit_btn" onclick=" submitNewRapidas()">
                                                    Postar <i class="material-icons right hide-on-med-and-up">send</i>
                                                </button>
                                                
                                            </div>

                                            </div>
                                            </form>
                                        </div>
                                        
                                    </div>
                                        
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="modal" id="modal_new_post1">
                        <div class="modal-content new_post_content" id="modal_content">
                            <div class="">
                                <div class="container_new_post">
                                   
                                    <div class="row user_info_row">
                                        <div class="user_info_row" id="inner">
                                            <img rel="preload" src="<?php echo $icon; ?> " alt="user image">
                                            <p><?php echo $full_name; echo $verified_icon ?> <br><span><?php echo $title; ?></span></p>
                                        </div>
                                        <div>
                                            <button id="post_dismiss" class="modal-close btn waves-effect waves-dark right">
                                                <i class="material-icons center">close</i>
                                            </button>
                                        </div>
                                        
                                    </div>

                                    <div class="container_new_post_inputs" id="container_new_post_inputs">
                                        <input type="hidden" id="userloggedin" value="<?php echo $userloggedin; ?>">

                                        <div class="row">
                                            <h5 style="max-width:135px">
                                                Boladas
                                                <i  class="material-icons left">handshake</i>
                                            </h5>
                                            
                                        </div>

                                        <div id="boladas">
                                            <div class="container_category_container" id="container_category_container">
                                                <div class="row">
                                                    <div class="file-field input-field">
                                                        <div class="btn">
                                                            <span>Fotos</span>
                                                            <input type="file" accept=".jpeg,.jpg,.png" limit ="3" id="prod_imgs1" multiple>
                                                        </div>
                                                        <div class="file-path-wrapper">
                                                            <input class="file-path validate" onchange="checkLabel()" type="text" placeholder="Escolha 3 imagens" id="img_prod_label1">
                                                        </div>
                                                    </div>
                                                    <p id="error_msg1" style="font-size:50%;margin: 2px 0 2px 40px; color:red;"></p>

                                                </div>


                                                <div class="row">
                                                    <div class="input-field col s6">
                                                        <i class="material-icons prefix">category</i>
                                                        <input  name="prod_name" id="prod_name1" type="text" class="validate">
                                                        <label for="prod_name">Nome do item</label>
                                                    </div>

                                                    <div class="input-field col s6">
                                                        <i class="material-icons prefix">payments</i>
                                                        <input name="price" id="price1" type="number" class="validate" >
                                                        <label for="price">Preço / unidade</label>
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="input-field col s12">
                                                        <i class="material-icons prefix">edit_note</i>
                                                        <textarea id="description1" class="materialize-textarea" data-length="120"></textarea>
                                                        <label for="textarea1">Descrição</label>
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="input-field col s6 m6">
                                                        <i class="material-icons prefix">pin_drop</i>
                                                        <select class="" id="location1">
                                                            <option value="" disabled selected>Provincia</option>
                                                            <option value="1" >Maputo</option>
                                                            <option value="2" >Gaza</option>
                                                            <option value="3" >Inhambane</option>
                                                            <option value="4" >Manica</option>
                                                            <option value="5" >Sofala</option>
                                                            <option value="6" >Tete</option>
                                                            <option value="7" >Zambezia</option>
                                                            <option value="8" >Nampula</option>
                                                            <option value="9" >Cabo Delgado</option>
                                                            <option value="10" >Niassa</option>
                                                        </select>
                                                    </div>
                                                    <div class="input-field col s6 m6">
                                                        <i class="material-icons prefix">info</i>
                                                        <select class="" id="status1">
                                                            <option value="" disabled selected>Estado do item</option>
                                                            <option value="1" >Novo</option>
                                                            <option value="2" >Usado - boas condições</option>
                                                            <option value="3" >Usado - com defeitos</option>
                                                        </select>
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="row valign-wrapper">
                                                        <i style="font-size:100%;margin-left:0px;" class="material-icons prefix">local_shipping</i>
                                                        <span style="font-size:60%; margin-left: 25px; ">Faz entregas?</span>
                                                    </div>
                                                    
                                                    <div class="switch deliver_switch">
                                                        <label>
                                                        Não
                                                        <input id="deliver1" type="checkbox">
                                                        <span class="lever"></span>
                                                        Sim
                                                        </label>
                                                    </div>
                                                </div>

                                                <div class="row container_post_btn">
                                                    <p id="error_msg3" style="font-size:50%;margin: 10px 0 10px 0px; color:red;"></p>
                                                    <button id="submit_btn1" class="btn waves-effect waves-dark" onclick="submitNewBoladas()">
                                                        Postar <i class="material-icons right hide-on-med-and-up">send</i>
                                                    </button>
                                                   

                                                </div>

                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="modal" id="modal_new_post2">
                        <div class="modal-content new_post_content" id="modal_content">
                            <div class="">
                                <div class="container_new_post">
                                   
                                    <div class="row user_info_row">
                                        <div class="user_info_row" id="inner">
                                            <img rel="preload" src="<?php echo $icon; ?> " alt="user image">
                                            <p><?php echo $full_name; echo $verified_icon ?> <br><span><?php echo $title; ?></span></p>
                                        </div>
                                        <div>
                                            <button id="post_dismiss" class="modal-close btn waves-effect waves-dark right">
                                                <i class="material-icons center">close</i>
                                            </button>
                                        </div>
                                        
                                    </div>

                                    <div class="container_new_post_inputs" id="container_new_post_inputs">
                                        <input type="hidden" id="userloggedin" value="<?php echo $userloggedin; ?>">

                                        <div class="row">
                                            <h5 style="max-width:135px">
                                                Alugar
                                                <i class="material-icons left">cottage</i>
                                            </h5>
                                        </div>

                                        <div id="alugar">
                                            <div class="container_category_container" id="container_category_container">
                                                <div class="row">
                                                    <div class="file-field input-field">
                                                        <div class="btn">
                                                            <span>Fotos</span>
                                                            <input type="file" accept=".jpeg,.jpg,.png" limit ="3" id="prod_imgs2" multiple>
                                                        </div>
                                                        <div class="file-path-wrapper">
                                                            <input class="file-path validate" onchange="checkLabel()" type="text" placeholder="Escolha 3 imagens" id="img_prod_label2">
                                                        </div>
                                                    </div>
                                                    <p id="error_msg4" style="font-size:50%;margin: 2px 0 2px 40px; color:red;"></p>

                                                </div>


                                                <div class="row">
                                                    <div class="input-field col s6">
                                                        <i class="material-icons prefix">category</i>
                                                        <input name="prod_name" id="prod_name2" type="text" class="validate">
                                                        <label for="prod_name">Nome do item</label>
                                                    </div>

                                                    <div class="input-field col s6">
                                                        <i class="material-icons prefix">payments</i>
                                                        <input name="price" id="price2" type="number" class="validate">
                                                        <label for="price">Preço</label>
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="input-field col s12">
                                                        <i class="material-icons prefix">edit_note</i>
                                                        <textarea id="description2" class="materialize-textarea" data-length="120"></textarea>
                                                        <label for="description2">Descrição</label>
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="input-field col s6 m6">
                                                        <i class="material-icons prefix">pin_drop</i>
                                                        <select class="" id="location2">
                                                            <option value="" disabled selected>Provincia</option>
                                                            <option value="1" >Maputo</option>
                                                            <option value="2" >Gaza</option>
                                                            <option value="3" >Inhambane</option>
                                                            <option value="4" >Manica</option>
                                                            <option value="5" >Sofala</option>
                                                            <option value="6" >Tete</option>
                                                            <option value="7" >Zambezia</option>
                                                            <option value="8" >Nampula</option>
                                                            <option value="9" >Cabo Delgado</option>
                                                            <option value="10" >Niassa</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                

                                                <div class="row container_post_btn">
                                                    <p id="error_msg5" style="font-size:50%;margin: 10px 0 10px 0px; color:red;"></p>
                                                    <button id="submit_btn2" class="btn waves-effect waves-dark" onclick="submitNewAlugar()">
                                                        Postar <i class="material-icons right hide-on-med-and-up">send</i>
                                                    </button>
                                                </div>

                                            </div>
                                        </div>
                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="modal" id="modal_new_post3">
                        <div class="modal-content new_post_content" id="modal_content">
                            <div class="">
                                <div class="container_new_post">
                                   
                                    <div class="row user_info_row">
                                        <div class="user_info_row" id="inner">
                                            <img rel="preload" src="<?php echo $icon; ?> " alt="user image">
                                            <p><?php echo $full_name; echo $verified_icon ?> <br><span><?php echo $title; ?></span></p>
                                        </div>
                                        <div>
                                            <button id="post_dismiss" class="modal-close btn waves-effect waves-dark right">
                                                <i class="material-icons center">close</i>
                                            </button>
                                        </div>
                                        
                                    </div>

                                    <div class="container_new_post_inputs" id="container_new_post_inputs">
                                        <input type="hidden" id="userloggedin" value="<?php echo $userloggedin; ?>">

                                        <div class="row">
                                            <h5  style="max-width:165px">
                                                Desapego
                                                <i class="material-icons left">volunteer_activism</i>
                                            </h5>
                                        </div>

                                        <div id="desapego">
                                            <div class="container_category_container" id="container_category_container">
                                                <div class="row">
                                                    <div class="file-field input-field">
                                                        <div class="btn">
                                                            <span>Fotos</span>
                                                            <input type="file" accept=".jpeg,.jpg,.png" limit ="3" id="prod_imgs3" multiple>
                                                        </div>
                                                        <div class="file-path-wrapper">
                                                            <input class="file-path validate" onchange="checkLabel()" type="text" placeholder="Escolha 3 imagens" id="img_prod_label3">
                                                        </div>
                                                    </div>
                                                    <p id="error_msg6" style="font-size:50%;margin: 2px 0 2px 40px; color:red;"></p>

                                                </div>


                                                <div class="row">
                                                    <div class="input-field col s6">
                                                        <i class="material-icons prefix">category</i>
                                                        <input  name="prod_name" id="prod_name3" type="text" class="validate">
                                                        <label for="prod_name">Nome do item</label>
                                                    </div>

                                                    <div class="input-field col s6">
                                                        <i class="material-icons prefix">payments</i>
                                                        <input name="price" id="price3" type="number" class="validate" >
                                                        <label for="price">Preço / unidade</label>
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="input-field col s6">
                                                        <i class="material-icons prefix">edit_note</i>
                                                        <textarea id="description3" class="materialize-textarea"></textarea>
                                                        <label for="description3">Descrição</label>
                                                    </div>

                                                    <div class="input-field col s6">
                                                        <i class="material-icons prefix">schedule</i>
                                                        <input name="use_time" id="use_time3" type="number" class="validate">
                                                        <label for="use_time">Tempo de uso (anos)</label>
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="input-field col s6 m6">
                                                        <i class="material-icons prefix">pin_drop</i>
                                                        <select class="" id="location3">
                                                            <option value="" disabled selected>Provincia</option>
                                                            <option value="1" >Maputo</option>
                                                            <option value="2" >Gaza</option>
                                                            <option value="3" >Inhambane</option>
                                                            <option value="4" >Manica</option>
                                                            <option value="5" >Sofala</option>
                                                            <option value="6" >Tete</option>
                                                            <option value="7" >Zambezia</option>
                                                            <option value="8" >Nampula</option>
                                                            <option value="9" >Cabo Delgado</option>
                                                            <option value="10" >Niassa</option>
                                                        </select>
                                                    </div>
                                                    <div class="input-field col s6 m6">
                                                        <i class="material-icons prefix">info</i>
                                                        <select class="" id="status3">
                                                            <option value="" disabled selected>Estado do item</option>
                                                            <option value="1" >Novo</option>
                                                            <option value="2" >Usado - boas condições</option>
                                                            <option value="3" >Usado - com defeitos</option>
                                                        </select>
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="row valign-wrapper">
                                                        <i style="font-size:100%;margin-left:0px;" class="material-icons prefix">local_shipping</i>
                                                        <span style="font-size:60%; margin-left: 25px; ">Faz entregas?</span>
                                                    </div>
                                                    
                                                    <div class="switch deliver_switch">
                                                        <label>
                                                        Não
                                                        <input id="deliver3" type="checkbox">
                                                        <span class="lever"></span>
                                                        Sim
                                                        </label>
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="row valign-wrapper">
                                                        <i style="font-size:100%;margin-left:0px;" class="material-icons prefix">handshake</i>
                                                        <span style="font-size:60%; margin-left: 25px; ">Negociavel?</span>
                                                    </div>
                                                    
                                                    <div class="switch deliver_switch">
                                                        <label>
                                                        Não
                                                        <input id="negotiable3" type="checkbox">
                                                        <span class="lever"></span>
                                                        Sim
                                                        </label>
                                                    </div>
                                                </div>

                                                <div class="row container_post_btn">
                                                    <p id="error_msg7" style="font-size:50%;margin: 10px 0 10px 0px; color:red;"></p>
                                                    <button id="submit_btn3" class="btn waves-effect waves-dark" onclick="submitNewDesapego()">
                                                        Postar <i class="material-icons right hide-on-med-and-up">send</i>
                                                    </button>
                                                   

                                                </div>

                                            </div>
                                        </div>
                                       
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                <?php
            }
        ?>
                

        <?php 
        if(isset($userloggedin) && $seller == 'yes')
        {
           ?>
            <div class="fixed-action-btn container_fab " id="btn_fab" >
                <button class="btn-floating btn-large btn_fab  click-to-toggle valign-wrapper waves-effect waves-light center <?php echo $disable; ?>" id="" >
                    <i class="large material-icons">add</i>
                </button>
                <ul>
                    <li><button <?php echo $verified_disable; echo $disable ?> class="btn-floating modal-trigger tooltipped" data-position="left" data-target="modal_new_post3"  data-tooltip="Desapego" ><i class="material-icons">volunteer_activism</i></button></li>
                    <li><button <?php echo $verified_disable; echo $disable ?> class="btn-floating modal-trigger tooltipped" data-position="left" data-target="modal_new_post2" data-tooltip="Alugar" ><i class="material-icons">cottage</i></button></li>
                    <li><button <?php echo $verified_disable; echo $disable ?> class="btn-floating modal-trigger tooltipped" data-position="left" data-target="modal_new_post1" data-tooltip="Boladas" ><i class="material-icons">handshake</i></button></li>
                    <li><button <?php echo $disable;?> class="btn-floating modal-trigger tooltipped" data-tooltip="Cenas rapidas" data-position="left" data-target="modal_new_post"><i class="material-icons">timer</i></button></li>
                </ul>
            </div>

            <?php 
        } 
        
        ?>


<?php
    include 'footer.php'; 
?>

        

