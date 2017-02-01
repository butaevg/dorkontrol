<?php

/* @var $this yii\web\View */

use yii\helpers\Html;
use yii\widgets\ActiveForm;

$this->title = 'Дагдорконтроль';
?>

<!--<div id="content">-->
        
        <div id="col1">
            <div class="sq">
                <div class="title_blue">
                    <span class="title_txt">Ход работ</span> 
                    <div class="all_link"><a href="road/progress/124">Все объекты</a></div>
                </div>
                <ul>
                    <li><a href="road/progress/124">Строительство а/д Гунибское шоссе-Вантляшевский перевал км 72 - км 85</a></li> 
                    <li><a href="road/progress/123">Реконструкция а/д Грозный-Ботлих-Хунзах-Араканская площадка на участке км 214-км 220</a></li>
                    <li><a href="road/progress/73">Реконструкция а/д Манас – Сергокала – Первомайское</a></li>
                    <li><a href="road/progress/122">Реконструкция а/д Грозный-Ботлих-Хунзах-Араканская площадк» на участке км 184,5-км 192,6</a></li>
                    <li><a href="road/progress/112">Реконструкция автомобильной дороги Махачкала - Каспийск</a></li>
                    <li><a href="road/progress/108">Реконструкция автомобильной дороги Агвали - Шаури - Кидеро</a></li>
                    <li><a href="road/progress/93">Реконструкция автомобильной дороги Муни - Агвали</a></li>
                    <li><a href="road/progress/71">Реконструкция а/д Грозный-Ботлих-Хунзах-Араканская площадка км 110-км 117</a></li>
                    <li></li>
                </ul>
            </div>
            <div class="sq">
                <div class="title_blue">
                    <span class="title_txt">Видеомониторинг</span> 
                    <div class="all_link"><a href="camera/ip/">Подробнее</a></div>
                </div>
                <ul>
                    <li><a href="camera/4">Автодорога Урма-Губден (в сторону с.Урма)</a></li>
                    <li><a href="camera/5">Автодорога Урма-Губден (в сторону с.Губден)</a></li>
                    <li><a href="camera/6">Автодорога Махачкала-Аэропорт</a></li>
                    <li><a href="camera/7">Северный подъезд к Гимринскому а/д тоннелю</a></li>
                    <li></li>
                </ul>
            </div>
            <div class="sq">
                <div class="title_blue">
                    <span class="title_txt">Передовые технологии</span> 
                    <!--<div class="all_link"><a href="">Подробнее</a></div>-->
                </div>
                <ul>
                    <li><a href="page/geoinformacionnaya-sistema">Геоинформационная система</a></li>
                    <li><a href="page/asfaltobetonnye-zavody">Современные асфальтобетонные заводы</a></li>
                    <li><a href="page/3d-nivelirovanie">3D-нивелирование</a></li>
                    <li><a href="page/videomonitoring-dorozhnyh-rabot">Видеомониторинг дорожных работ</a></li>                  
                    <li></li>
                </ul>
            </div>
            <div class="sq">
                <div class="title_blue">
                    <span class="title_txt">Экстренные службы</span> 
                </div>
                <ul>
                    <li><span><b>МЧС: </b>010 (моб. тел.), 67-32-42 (дежурный)</span></li>
                    <li><span><b>МВД: </b>020 (моб. тел.), 99-45-00 (дежурный)</span></li>
                    <li><span><b>ГИБДД: </b>99-46-96 (дежурный)</span></li>
                    <li><span><b>Скорая помощь: </b>030 (моб. тел.)</span></li> 
                    </ul>
            </div>          
        </div><!--end col1-->

        <div id="col3">
            <div class="sq">
                <div class="title_blue">
                    <span class="title_txt">
                    <?php  
                        if (Yii::$app->user->isGuest) {
                            echo "Авторизация";
                        }
                        else {
                            echo Yii::$app->user->identity->name;
                        }
                    ?>
                    </span> 
                </div>
                <ul>
                    <div class="cam">
                    <?php
                        if (!Yii::$app->user->isGuest) {
                            echo "<a href=user/><span>Личный кабинет</span></a><br>
                            <a href=user/logout/><span>Выход</span></a><br><br>";
                        }
                        else { ?>

                        <?php $form = ActiveForm::begin([
                            'action' => 'user/login',    
                            //'id' => 'login-form',
                            //'layout' => 'horizontal',
                            'fieldConfig' => [
                                'template' => "{input}",
                            ],
                        ]); ?>

                            <?= $form->field($loginform, 'username')->textInput(['autofocus' => true, 'placeholder' => ' логин']) ?>

                            <?= $form->field($loginform, 'password')->passwordInput(['placeholder' => ' пароль']) ?>

                            <?= Html::submitButton('Вход') ?>

                        <?php ActiveForm::end(); 
                        }  
                    ?>           
                    </div>
                    <div class="cam"><a href="weather/"><img src='img/sidebar/pogoda.png'></a></div>
                    <div class="cam"><a href="road/progress/124"><img src='img/sidebar/xod.png'></a></div>
                    <div class="cam"><a href="camera/ip/"><img src='img/sidebar/videomon.jpg'></a></div>
                </ul>   
            </div>
        </div><!--end col3-->

        <div id="col2">
            <div class="sq">
                <div class="title_blue">
                    <span class="title_txt">Дорожные и погодные условия</span> 
                    <div class="all_link"><a href="weather/">Подробнее</a></div>
                </div>
                <table class="mainpage_weather">
                    <?php
                    foreach ($model as $m) {
                    echo "<tr>
                    <td align=left width=40>".Yii::$app->formatter->asDatetime($m->putdate, "php:d.m")."</td>
                    <td align=left>".$m->user->name."</td>
                    <td>";
                    if ($m->sost == "ясно") {
                       echo "<img src='img/icons/weather/sun.png' title=ясно>";
                    }
                    else {

                        if ($m->sost == "пасмурно") {
                            echo "<img src=img/icons/weather/overcast.png title=пасмурно>";
                        }
                        else {
                            if ($m->sost == "туман") {
                               echo "<img src=img/icons/weather/foggy.png title=туман>";
                            }
                            else {
                                if ($m->sost == "дождь") {
                                    echo "<img src=img/icons/weather/rain.png title=дождь>";
                                }
                                else {
                                    echo "<img src=img/icons/weather/snow.png title=снег>";
                                } 
                            }
                        }
                    }
                    echo "</td>
                    <td>".$m->temp."&deg;</td>
                    <td>";
                        
                    if ($m->pr_r == "покрытие дорог сухое") {
                        echo "дороги сухие";
                    }
                    else {
                        if ($m->pr_r == "покрытие дорог мокрое") {
                            echo "дороги мокрые";
                        }
                        else {
                            if (($m->pr_r == "снег") or ($m->pr_r == "снежный накат")) {
                                echo "на дорогах снег";
                            }
                            else {
                                if (($m->pr_r == "слаб. гололедица") or ($m->pr_r == "гололед")) {
                                    echo "гололед";
                                }
                                else {
                                    echo "подсыпаны ПГМ";
                                }
                                }    
                            }
                        }

                    echo "</td>
                    </tr>";
                    } ?>
                </table>
            </div>      
        </div><!--end col2-->