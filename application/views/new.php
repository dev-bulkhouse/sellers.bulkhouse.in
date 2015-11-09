<!DOCTYPE HTML>
<html class="">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/3.0.1/normalize.min.css">
        <link rel="stylesheet" href="http://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
        <link href='http://fonts.googleapis.com/css?family=Raleway:100,200,300,400' rel='stylesheet' type='text/css'>

        <!-- build:js modernizr.touch.js -->

        <!-- endbuild -->
        <script src="/js/modernizr.touch.js" type="text/javascript"></script>


        <link href="/css/index.css" rel="stylesheet" type="text/css"/>
        <!-- build:css mfb.css -->

        <link href="/css/mfb.css" rel="stylesheet" type="text/css"/>
        <!-- endbuild -->

        <title>Material floating button. The index.</title>
    </head>
    <body>

        <ul id="menu" class="mfb-component--br mfb-zoomin" data-mfb-toggle="click">
            <li class="mfb-component__wrap">
                <a href="#" class="mfb-component__button--main">
                    <i class="mfb-component__main-icon--resting ion-plus-round"></i>
                    <i class="mfb-component__main-icon--active ion-close-round"></i>
                </a>
                <ul class="mfb-component__list">
                    <li>
                        <a data-mfb-label="Pan Card" class="mfb-component__button--child" href='javascript:;'>
                            <i class="mfb-component__child-icon ion-card"></i>
                            <input type="file" style='position:absolute;z-index:2;top:0;left:0;filter: alpha(opacity=0);-ms-filter:"progid:DXImageTransform.Microsoft.Alpha(Opacity=0)";opacity:0;background-color:transparent;color:transparent;' name="file_source"  onchange='$("#upload-file-info").html($(this).val());'>
                        </a>
                    </li>
                    <li>
                        <a data-mfb-label="VAT - CST" class="mfb-component__button--child" href='javascript:;'>
                            <i class="mfb-component__child-icon ion-card"></i>
                            <input type="file" style='position:absolute;z-index:2;top:0;left:0;filter: alpha(opacity=0);-ms-filter:"progid:DXImageTransform.Microsoft.Alpha(Opacity=0)";opacity:0;background-color:transparent;color:transparent;' name="file_source"  onchange='$("#upload-file-info").html($(this).val());'>
                        </a>

                    </li>

                    <li>
                        <a data-mfb-label="Photo ID" class="mfb-component__button--child" href='javascript:;'>
                            <i class="mfb-component__child-icon ion-card"></i>
                            <input type="file" style='position:absolute;z-index:2;top:0;left:0;filter: alpha(opacity=0);-ms-filter:"progid:DXImageTransform.Microsoft.Alpha(Opacity=0)";opacity:0;background-color:transparent;color:transparent;' name="file_source"  onchange='$("#upload-file-info").html($(this).val());'>
                        </a>
                    </li>
                    <li>
                        <a data-mfb-label="Adress ID" class="mfb-component__button--child" href='javascript:;'>
                            <i class="mfb-component__child-icon ion-card"></i>
                            <input type="file" style='position:absolute;z-index:2;top:0;left:0;filter: alpha(opacity=0);-ms-filter:"progid:DXImageTransform.Microsoft.Alpha(Opacity=0)";opacity:0;background-color:transparent;color:transparent;' name="file_source"  onchange='$("#upload-file-info").html($(this).val());'>
                        </a>
                    </li>
                </ul>
            </li>
        </ul>

        <!-- build:js mfb.js -->

        <script src="/js/mfb.js" type="text/javascript"></script>
        <!-- endbuild -->
        <script>

                                                                                          var panel = document.getElementById('panel'),
                                                                                                  menu = document.getElementById('menu'),
                                                                                                  showcode = document.getElementById('showcode'),
                                                                                                  selectFx = document.getElementById('selections-fx'),
                                                                                                  selectPos = document.getElementById('selections-pos'),
                                                                                                  // demo defaults
                                                                                                  effect = 'mfb-zoomin',
                                                                                                  pos = 'mfb-component--br';

                                                                                          showcode.addEventListener('click', _toggleCode);
                                                                                          selectFx.addEventListener('change', switchEffect);
                                                                                          selectPos.addEventListener('change', switchPos);

                                                                                          function _toggleCode() {
                                                                                              panel.classList.toggle('viewCode');
                                                                                          }

                                                                                          function switchEffect(e) {
                                                                                              effect = this.options[this.selectedIndex].value;
                                                                                              renderMenu();
                                                                                          }

                                                                                          function switchPos(e) {
                                                                                              pos = this.options[this.selectedIndex].value;
                                                                                              renderMenu();
                                                                                          }

                                                                                          function renderMenu() {
                                                                                              menu.style.display = 'none';
                                                                                              // ?:-)
                                                                                              setTimeout(function () {
                                                                                                  menu.style.display = 'block';
                                                                                                  menu.className = pos + effect;
                                                                                              }, 1);
                                                                                          }

        </script>
        <!-- @include ga.html -->
    </body>
</html>
