
<div class="top-scroller js-top-scroller svg-icons">
   <svg class="pt10" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" width="32" data-fa-i2svg=""><path fill="currentColor" d="M6.101 261.899L25.9 281.698c4.686 4.686 12.284 4.686 16.971 0L198 126.568V468c0 6.627 5.373 12 12 12h28c6.627 0 12-5.373 12-12V126.568l155.13 155.13c4.686 4.686 12.284 4.686 16.971 0l19.799-19.799c4.686-4.686 4.686-12.284 0-16.971L232.485 35.515c-4.686-4.686-12.284-4.686-16.971 0L6.101 244.929c-4.687 4.686-4.687 12.284 0 16.97z"></path></svg>
</div>

<?php $idcase=navigationidcases() ?>
<nav class="fixed-bottom sdr-navbar-lg" id="bottom-nav">
    <!-- case view for mobile devices-->
    <div class="container sdr-caseview-mobile-width sdr-navbar-mobile-case d-block d-md-none d-lg-none d-xl-none">
        <div class="row justify-content-center">
            <div class="col-12 justify-content-center">
                <!--Indonesia case information-->
                <div class="d-flex flex-wrap justify-content-center">
                    <!--INDONESIA-->
                    <div class="pr10 pl10 pt12 pb12 d-flex flex-nowrap">
                        <div  style="height:30px; width:30px;" class="justify-content-center d-flex flex-column">
                            <img class="img-fluid" src="img/asset/nav/indonesiaflag-sm.svg" alt="bendera Indonesia">
                        </div>
                        <div class="f20 cl-dusty-gray align-self-center ml10">INDONESIA</div>
                    </div>
                    <!--Total-->
                    <div class="pr10 pl10 pt12 pb12 d-flex flex-nowrap ml17">
                        <div  style="height:30px; width:30px;" class="justify-content-center d-flex flex-column">
                            <img class="img-fluid" src="img/asset/nav/total-sm.svg" alt="total kasus coronavirus indonesa">
                        </div>
                        <div class="f20 font-weight-bold cl-dusty-gray align-self-center ml10"><?php echo $idcase['case'] ?></div>
                    </div>
                    <!--Death-->
                    <div class="pr10 pl10 pt12 pb12 d-flex flex-nowrap ml17">
                        <div  style="height:30px; width:30px;" class="justify-content-center d-flex flex-column">
                            <img class="img-fluid" src="img/asset/nav/death-sm.svg" alt="total kematian coronavirus indonesa">
                        </div>
                        <div class="f20 font-weight-bold cl-dusty-gray align-self-center ml10"><?php echo $idcase['death'] ?></div>
                    </div>
                    <!--Recovery-->
                    <div class="pr10 pl10 pt12 pb12 d-flex flex-nowrap ml17">
                        <div  style="height:30px; width:30px;" class="justify-content-center d-flex flex-column">
                            <img class="img-fluid" src="img/asset/nav/recovery-sm.svg" alt="total kesembuhan coronavirus indonesa">
                        </div>
                        <div class="f20 font-weight-bold cl-dusty-gray align-self-center ml10"><?php echo $idcase['recovery'] ?></div>
                    </div>
                    <!--Kasus Aktif-->
                    <div class="pr10 pl10 pt12 pb12 d-flex flex-nowrap ml17">
                        <div  style="height:30px; width:30px;" class="justify-content-center d-flex flex-column">
                            <img class="img-fluid" src="img/asset/nav/active-sm.svg" alt="total kasus aktif coronavirus indonesa">
                        </div>
                        <div class="f20 font-weight-bold cl-dusty-gray align-self-center ml10"><?php echo $idcase['active'] ?></div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!--Navigation Bar-->
    <div class="container sdr-navbar-width">
        <div class="row justify-content-center">
            <!--Navbar for large screens-->
            <div class="col-12 justify-content-center d-lg-block d-xl-block d-md-block d-none">
                <div class="d-flex flex-wrap justify-content-center">
                    <!--Navigation-->
                    <div class="d-flex flex-wrap justify-content-center">
                        <!--Home-->
                        <a class="a-none" href="https://sehatdirumah.com">
                            <div class="pr10 pl10 pt12 pb12 d-flex flex-nowrap nav-hover">
                                <div  style="height:25.6px;" class="justify-content-center d-flex flex-column">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="25.019" height="24.246" viewBox="0 0 25.019 24.246">
                                        <defs>
                                            <style>.<?php if($pos=='home'){echo 'nav-ico-active';}else{echo 'nav-ico-def';}?>{stroke-width:0px;}</style>
                                        </defs>
                                        <g transform="translate(-0.001 -0.068)">
                                            <g transform="translate(0.001 0.068)">
                                                <g transform="translate(0 0)">
                                                    <path class="<?php if($pos=='home'){echo 'nav-ico-active';}else{echo 'nav-ico-def';}?>"
                                                          d="M25.013,10.556A2.1,2.1,0,0,0,24.252,9.1L22.088,7.3V2.194a.722.722,0,0,0-.733-.71H18.423a.714.714,0,0,0-.723.71V3.649L13.99.585a2.24,2.24,0,0,0-2.86,0L.769,9.1a2.086,2.086,0,0,0-.238,3.007,2.268,2.268,0,0,0,2.412.621V23.6a.714.714,0,0,0,.723.71H21.355a.722.722,0,0,0,.733-.71V12.729a2.243,2.243,0,0,0,2.4-.622A2.077,2.077,0,0,0,25.013,10.556ZM19.156,2.9h1.476V6.085L19.156,4.867ZM15.5,22.893H9.53V17.2H15.5Zm5.131,0H16.957V16.5a.722.722,0,0,0-.733-.71H8.8a.714.714,0,0,0-.723.71v6.394H4.4V11.707L12.557,5l8.075,6.7V22.893Zm2.746-11.711a.749.749,0,0,1-1.034.077L13.036,3.526a.751.751,0,0,0-.951,0L2.678,11.259a.752.752,0,0,1-1.034-.077.7.7,0,0,1,.077-1L12.082,1.664a.747.747,0,0,1,.954,0L23.3,10.18A.7.7,0,0,1,23.377,11.182Z"
                                                          transform="translate(-0.001 -0.068)"/>
                                                </g>
                                            </g>
                                            <g transform="translate(9.631 8.588)">
                                                <path class="<?php if($pos=='home'){echo 'nav-ico-active';}else{echo 'nav-ico-def';}?>"
                                                      d="M200.266,179.938h-4.358a.7.7,0,0,0-.7.71v4.263a.7.7,0,0,0,.7.71h4.358a.711.711,0,0,0,.71-.71v-4.263A.71.71,0,0,0,200.266,179.938Zm-.7,4.263h-2.946v-2.842h2.946Z"
                                                      transform="translate(-195.207 -179.938)"/>
                                            </g>
                                            <g transform="translate(12.583 18.63)">
                                                <circle class="<?php if($pos=='home'){echo 'nav-ico-active';}else{echo 'nav-ico-def';}?>" cx="0.71" cy="0.71" r="0.71"/>
                                            </g>
                                        </g>
                                    </svg>
                                </div>
                                <div class="f16 <?php if($pos=='home'){echo ' nav-font-active';}else{echo ' nav-font-def ';}?> align-self-center ml7">Home</div>
                            </div>
                        </a>
                        <!--Region-->
                        <a class="a-none" href="region">
                            <div class="pr10 pl10 pt12 pb12 d-flex flex-nowrap nav-hover">
                                <div  style="height:25.6px;" class="justify-content-center d-flex flex-column">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="15.064" height="25.273" viewBox="0 0 15.064 25.273">
                                        <defs>
                                            <style>.<?php if($pos=='region'){echo 'nav-ico-active';}else{echo 'nav-ico-def';}?>{stroke-width:0.2px;}</style>
                                        </defs>
                                        <g transform="translate(-103.968 0.101)">
                                            <path class="<?php if($pos=='region'){echo 'nav-ico-active';}else{echo 'nav-ico-def';}?>"
                                                  d="M147.593,308.7h-9.06l.509-5.279a.392.392,0,0,0-.781-.075l-.517,5.354h-2.733a.392.392,0,1,0,0,.785H147.2v.678h-.488a2.653,2.653,0,0,0-2.62,2.256h-.483a.392.392,0,1,0,0,.785h.847a.392.392,0,0,0,.392-.392,1.866,1.866,0,0,1,1.864-1.864h.88a.392.392,0,0,0,.392-.392v-1.463A.392.392,0,0,0,147.593,308.7Z"
                                                  transform="translate(-29.053 -288.132)"/>
                                            <path class="<?php if($pos=='region'){echo 'nav-ico-active';}else{echo 'nav-ico-def';}?>"
                                                  d="M113.069,423.122H107.96a2.653,2.653,0,0,0-2.62-2.256h-.488V419.8a.392.392,0,1,0-.785,0v1.463a.392.392,0,0,0,.392.392h.88a1.866,1.866,0,0,1,1.864,1.864.392.392,0,0,0,.392.392h5.473a.392.392,0,1,0,0-.785Z"
                                                  transform="translate(0 -398.835)"/>
                                            <path class="<?php if($pos=='region'){echo 'nav-ico-active';}else{echo 'nav-ico-def';}?>"
                                                  d="M200.386,5.819a.392.392,0,0,0,.355.226.191.191,0,0,1,.14.061c.087.093.09-.251-.55,6.379a.392.392,0,1,0,.781.075c.631-6.544.6-6.251.6-6.261a.977.977,0,0,0-.708-1l-.385-.822H204.1l-.385.822A.976.976,0,0,0,203,6.311L204.3,19.7a.392.392,0,1,0,.781-.075C203.7,5.33,203.758,6.21,203.823,6.122a.191.191,0,0,1,.155-.078.392.392,0,0,0,.355-.226l.736-1.569a.393.393,0,0,0-.355-.559h-.468a3.447,3.447,0,0,0-.03-1.568.392.392,0,1,0-.76.194,2.672,2.672,0,0,1-.007,1.337h-2.177a2.509,2.509,0,0,1,1.088-2.82,2.225,2.225,0,0,1,.6.506.392.392,0,0,0,.6-.5,2.982,2.982,0,0,0-1.04-.8.392.392,0,0,0-.326,0,3.253,3.253,0,0,0-1.722,3.654h-.468a.393.393,0,0,0-.355.559Z"
                                                  transform="translate(-90.86)"/>
                                            <path class="<?php if($pos=='region'){echo 'nav-ico-active';}else{echo 'nav-ico-def';}?>" d="M211.076,272.706l-.038.392a.392.392,0,1,0,.781.075l.038-.392a.392.392,0,1,0-.781-.075Z"
                                                  transform="translate(-101.723 -258.995)"/>
                                        </g>
                                    </svg>
                                </div>
                                <div class="f16 <?php if($pos=='region'){echo ' nav-font-active';}else{echo ' nav-font-def ';}?> align-self-center ml7">Region</div>
                            </div>
                        </a>
                        <!--Peringkat-->
                        <a class="a-none" href="peringkat">
                            <div class="pr10 pl10 pt12 pb12 d-flex flex-nowrap nav-hover">
                                <div  style="height:25.6px;" class="justify-content-center d-flex flex-column">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24.991" height="24.991" viewBox="0 0 24.991 24.991">
                                        <defs>
                                            <style>.<?php if($pos=='peringkat'){echo 'nav-ico-active';}else{echo 'nav-ico-def';}?>{stroke-width:0px;}</style>
                                        </defs>
                                        <g transform="translate(0 23.95)">
                                            <path class="<?php if($pos=='peringkat'){echo 'nav-ico-active';}else{echo 'nav-ico-def';}?>" d="M24.47,490.667H.521a.521.521,0,1,0,0,1.041H24.47a.521.521,0,1,0,0-1.041Z"
                                                  transform="translate(0 -490.667)"/>
                                        </g>
                                        <g transform="translate(1.041 17.702)">
                                            <path class="<?php if($pos=='peringkat'){echo 'nav-ico-active';}else{echo 'nav-ico-def';}?>"
                                                  d="M24.978,362.667H21.854a.521.521,0,0,0-.521.521v6.248a.521.521,0,0,0,.521.521h3.124a.521.521,0,0,0,.521-.521v-6.248A.521.521,0,0,0,24.978,362.667Zm-.521,6.248H22.374v-5.206h2.083v5.206Z"
                                                  transform="translate(-21.333 -362.667)"/>
                                        </g>
                                        <g transform="translate(7.289 12.495)">
                                            <path class="<?php if($pos=='peringkat'){echo 'nav-ico-active';}else{echo 'nav-ico-def';}?>"
                                                  d="M152.978,256h-3.124a.521.521,0,0,0-.521.521v11.454a.521.521,0,0,0,.521.521h3.124a.521.521,0,0,0,.521-.521V256.521A.521.521,0,0,0,152.978,256Zm-.521,11.454h-2.083V257.041h2.083Z"
                                                  transform="translate(-149.333 -256)"/>
                                        </g>
                                        <g transform="translate(13.537 14.578)">
                                            <path class="<?php if($pos=='peringkat'){echo 'nav-ico-active';}else{echo 'nav-ico-def';}?>"
                                                  d="M280.978,298.667h-3.124a.521.521,0,0,0-.521.521v9.372a.521.521,0,0,0,.521.521h3.124a.521.521,0,0,0,.521-.521v-9.372A.521.521,0,0,0,280.978,298.667Zm-.521,9.372h-2.083v-8.33h2.083Z"
                                                  transform="translate(-277.333 -298.667)"/>
                                        </g>
                                        <g transform="translate(19.785 8.33)">
                                            <path class="<?php if($pos=='peringkat'){echo 'nav-ico-active';}else{echo 'nav-ico-def';}?>"
                                                  d="M408.978,170.667h-3.124a.521.521,0,0,0-.521.521v15.619a.521.521,0,0,0,.521.521h3.124a.521.521,0,0,0,.521-.521V171.188A.521.521,0,0,0,408.978,170.667Zm-.521,15.619h-2.083V171.708h2.083Z"
                                                  transform="translate(-405.333 -170.667)"/>
                                        </g>
                                        <g transform="translate(1.041 9.372)">
                                            <path class="<?php if($pos=='peringkat'){echo 'nav-ico-active';}else{echo 'nav-ico-def';}?>"
                                                  d="M23.416,192a2.083,2.083,0,1,0,2.083,2.083A2.085,2.085,0,0,0,23.416,192Zm0,3.124a1.041,1.041,0,1,1,1.041-1.041A1.042,1.042,0,0,1,23.416,195.124Z"
                                                  transform="translate(-21.333 -192)"/>
                                        </g>
                                        <g transform="translate(7.289 4.165)">
                                            <path class="<?php if($pos=='peringkat'){echo 'nav-ico-active';}else{echo 'nav-ico-def';}?>"
                                                  d="M151.416,85.333a2.083,2.083,0,1,0,2.083,2.083A2.085,2.085,0,0,0,151.416,85.333Zm0,3.124a1.041,1.041,0,1,1,1.041-1.041A1.042,1.042,0,0,1,151.416,88.457Z"
                                                  transform="translate(-149.333 -85.333)"/>
                                        </g>
                                        <g transform="translate(13.537 6.248)">
                                            <path class="<?php if($pos=='peringkat'){echo 'nav-ico-active';}else{echo 'nav-ico-def';}?>"
                                                  d="M279.416,128a2.083,2.083,0,1,0,2.083,2.083A2.085,2.085,0,0,0,279.416,128Zm0,3.124a1.041,1.041,0,1,1,1.041-1.041A1.042,1.042,0,0,1,279.416,131.124Z"
                                                  transform="translate(-277.333 -128)"/>
                                        </g>
                                        <g transform="translate(19.785)">
                                            <path class="<?php if($pos=='peringkat'){echo 'nav-ico-active';}else{echo 'nav-ico-def';}?>"
                                                  d="M407.416,0A2.083,2.083,0,1,0,409.5,2.083,2.085,2.085,0,0,0,407.416,0Zm0,3.124a1.041,1.041,0,1,1,1.041-1.041A1.042,1.042,0,0,1,407.416,3.124Z"
                                                  transform="translate(-405.333)"/>
                                        </g>
                                        <g transform="translate(16.203 2.665)">
                                            <path class="<?php if($pos=='peringkat'){echo 'nav-ico-active';}else{echo 'nav-ico-def';}?>"
                                                  d="M336.892,54.76a.521.521,0,0,0-.736,0l-4.04,4.04a.521.521,0,0,0,.736.736l4.04-4.04A.521.521,0,0,0,336.892,54.76Z"
                                                  transform="translate(-331.963 -54.608)"/>
                                        </g>
                                        <g transform="translate(10.353 6.154)">
                                            <path class="<?php if($pos=='peringkat'){echo 'nav-ico-active';}else{echo 'nav-ico-def';}?>" d="M216.115,127.053l-3.345-.954a.521.521,0,0,0-.285,1l3.345.954a.521.521,0,0,0,.285-1Z"
                                                  transform="translate(-212.108 -126.078)"/>
                                        </g>
                                        <g transform="translate(3.706 6.7)">
                                            <path class="<?php if($pos=='peringkat'){echo 'nav-ico-active';}else{echo 'nav-ico-def';}?>"
                                                  d="M80.788,137.469a.521.521,0,0,0-.731-.083l-3.926,3.13a.521.521,0,0,0,.325.928.525.525,0,0,0,.324-.112l3.926-3.13A.52.52,0,0,0,80.788,137.469Z"
                                                  transform="translate(-75.935 -137.273)"/>
                                        </g>
                                    </svg>
                                </div>
                                <div class="f16 <?php if($pos=='peringkat'){echo ' nav-font-active';}else{echo ' nav-font-def ';}?> align-self-center ml7">Peringkat</div>
                            </div>
                        </a>
                        <!--Edukasi-->
                        <a class="a-none" href="edukasi">
                            <div class="pr10 pl10 pt12 pb12 d-flex flex-nowrap nav-hover">
                                <div  style="height:25.6px;" class="justify-content-center d-flex flex-column">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="25.405" height="25.026" viewBox="0 0 25.405 25.026">
                                        <defs>
                                            <style>.<?php if($pos=='edukasi'){echo 'nav-ico-active';}else{echo 'nav-ico-def';}?>{stroke-width:0.4px;}</style>
                                        </defs>
                                        <g transform="translate(0.207 -3.835)">
                                            <path class="<?php if($pos=='edukasi'){echo 'nav-ico-active';}else{echo 'nav-ico-def';}?>"
                                                  d="M48.185,15.322a2.444,2.444,0,0,0-.862-1.705,2.235,2.235,0,0,0-1.669-.518,2.392,2.392,0,0,0-1.91,1.4l-.75.066-.74-.207a.186.186,0,0,1-.124-.122,6.944,6.944,0,0,0-.913-1.8l.262-.7.826-.894a1.68,1.68,0,0,0,1.221-.584,1.708,1.708,0,0,0-.054-2.281,1.679,1.679,0,0,0-1.242-.526A1.7,1.7,0,0,0,41,7.993a1.686,1.686,0,0,0-.449,1.223l-.827.894-.693.321a6.947,6.947,0,0,0-3.406-.948l-.453-.722-.16-.794a2.153,2.153,0,0,0,.764-2.124A2.375,2.375,0,0,0,31.518,5.1,2.12,2.12,0,0,0,31.2,6.727a2.24,2.24,0,0,0,1.447,1.629l.176.877-.14.855a6.953,6.953,0,0,0-1.757,1.13l-.519-.092-.587-.443a1.7,1.7,0,1,0-1.345,1.981l.492.371.22.451a.073.073,0,0,1,0,.063,6.894,6.894,0,0,0-.634,2.9c0,.187.008.377.023.565a.078.078,0,0,1-.031.071l-.83.591-.947.3a2.221,2.221,0,0,0-2.059-.352l-.042.015-.012,0a.375.375,0,0,0,.254.706l.018-.006.018-.006a1.472,1.472,0,0,1,1.479.332.375.375,0,0,0,.371.086l1.2-.378a.375.375,0,0,0,.105-.052l.878-.626a.833.833,0,0,0,.343-.743c-.014-.168-.021-.337-.021-.5a6.149,6.149,0,0,1,.565-2.587.821.821,0,0,0-.008-.706l-.26-.532a.375.375,0,0,0-.111-.135l-.707-.533a.375.375,0,0,0-.341-.058.948.948,0,0,1-.859-.145.946.946,0,0,1-.147-1.372.955.955,0,0,1,1.242-.169.943.943,0,0,1,.417.708.375.375,0,0,0,.148.268l.783.59a.375.375,0,0,0,.16.07l.789.141a.375.375,0,0,0,.321-.094,6.211,6.211,0,0,1,1.866-1.2.375.375,0,0,0,.228-.286l.185-1.125a.376.376,0,0,0,0-.135L33.343,7.99a.375.375,0,0,0-.274-.289,1.512,1.512,0,0,1-1.131-1.13,1.375,1.375,0,0,1,.205-1.056,1.626,1.626,0,0,1,2.9.485,1.423,1.423,0,0,1-.649,1.491.375.375,0,0,0-.164.389l.221,1.1a.376.376,0,0,0,.05.125l.542.865a.566.566,0,0,0,.483.267h0a6.2,6.2,0,0,1,3.2.89.566.566,0,0,0,.531.03l.849-.394a.376.376,0,0,0,.118-.086L41.215,9.6a.375.375,0,0,0,.1-.312.945.945,0,0,1,1.619-.8.951.951,0,0,1,.029,1.27.939.939,0,0,1-.787.324.375.375,0,0,0-.3.12l-.991,1.072a.375.375,0,0,0-.076.124l-.322.866a.565.565,0,0,0,.074.531,6.2,6.2,0,0,1,.866,1.674.936.936,0,0,0,.633.606l.806.226a.375.375,0,0,0,.134.012l1.047-.092a.375.375,0,0,0,.322-.251,1.655,1.655,0,0,1,1.368-1.129,1.491,1.491,0,0,1,1.113.347,1.7,1.7,0,0,1,.6,1.187,1.829,1.829,0,0,1-.164.91.375.375,0,1,0,.681.317,2.584,2.584,0,0,0,.232-1.285Z"
                                                  transform="translate(-23.195 0)"/>
                                            <path class="<?php if($pos=='edukasi'){echo 'nav-ico-active';}else{echo 'nav-ico-def';}?>"
                                                  d="M23.1,245.9a1.515,1.515,0,0,1-1.87-.848.375.375,0,0,0-.373-.215l-.983.087a.375.375,0,0,0-.13.036l-.742.358a.935.935,0,0,0-.519.716,6.171,6.171,0,0,1-.352,1.362.932.932,0,0,0,.055.793l.264.472a.375.375,0,0,0,.119.128l.735.493a.375.375,0,0,0,.343.039.948.948,0,0,1,.866.1.946.946,0,0,1,.223,1.362.955.955,0,0,1-1.231.238.944.944,0,0,1-.455-.684.375.375,0,0,0-.163-.26l-.814-.546a.374.374,0,0,0-.164-.061l-.512-.062a.964.964,0,0,0-.784.262,6.247,6.247,0,0,1-1.37.99.965.965,0,0,0-.5.787l-.065,1.038a.375.375,0,0,0,.011.115l.322,1.279a.375.375,0,0,0,.263.27,1.27,1.27,0,0,1,.888.91,1.266,1.266,0,0,1-.954,1.545,1.266,1.266,0,0,1-1.16-2.14.375.375,0,0,0,.1-.36l-.324-1.286a.375.375,0,0,0-.045-.106l-.5-.8a1.1,1.1,0,0,0-.948-.52h0a6.238,6.238,0,0,1-1.208-.118,1.1,1.1,0,0,0-1.02.322l-.661.7a.377.377,0,0,0-.066.1l-.74,1.534a.375.375,0,0,0,0,.329.945.945,0,0,1-1.314,1.241.956.956,0,0,1-.41-1.179.938.938,0,0,1,.662-.564.375.375,0,0,0,.253-.2L8.573,252a.375.375,0,0,0,.034-.111l.146-1.037A.931.931,0,0,0,8.421,250a6.246,6.246,0,0,1-1.412-1.618.932.932,0,0,0-.784-.443l-1.035-.01a.372.372,0,0,0-.116.017l-1.133.357a.375.375,0,0,0-.26.316,1.472,1.472,0,0,1-2.862.294,1.452,1.452,0,0,1,.009-.931.375.375,0,1,0-.71-.244A2.2,2.2,0,0,0,.1,249.147a2.233,2.233,0,0,0,2.118,1.532,2.2,2.2,0,0,0,.662-.1,2.226,2.226,0,0,0,1.5-1.626l.858-.27.976.009a.176.176,0,0,1,.149.082,7,7,0,0,0,1.581,1.812.176.176,0,0,1,.061.161l-.138.979-.647,1.342a1.7,1.7,0,0,0-.27,3.076,1.682,1.682,0,0,0,1.343.141,1.7,1.7,0,0,0,1.02-.882,1.684,1.684,0,0,0,.068-1.31l.641-1.329.62-.655a.355.355,0,0,1,.329-.1,7,7,0,0,0,1.358.132h0a.356.356,0,0,1,.306.166l.469.754.261,1.034a2.008,2.008,0,0,0-.355,1.9,2.034,2.034,0,0,0,1.925,1.388,1.972,1.972,0,0,0,.429-.047,2.017,2.017,0,0,0,1.518-2.461,2.023,2.023,0,0,0-1.2-1.377l-.258-1.025.061-.98a.209.209,0,0,1,.108-.171,7,7,0,0,0,1.534-1.109.217.217,0,0,1,.175-.06l.423.051.61.409a1.7,1.7,0,1,0,1.233-2.052l-.511-.343-.22-.394a.184.184,0,0,1-.009-.156,6.924,6.924,0,0,0,.4-1.528.186.186,0,0,1,.1-.144l.68-.328.667-.059a2.259,2.259,0,0,0,2.659,1.006.375.375,0,0,0-.235-.713Z"
                                                  transform="translate(0 -228.723)"/>
                                            <path class="<?php if($pos=='edukasi'){echo 'nav-ico-active';}else{echo 'nav-ico-def';}?>"
                                                  d="M147.893,146.616a5.258,5.258,0,1,0,1.6.673.375.375,0,1,0-.4.634,4.486,4.486,0,1,1-1.372-.576.375.375,0,1,0,.172-.731Z"
                                                  transform="translate(-134.357 -135.284)"/>
                                            <path class="<?php if($pos=='edukasi'){echo 'nav-ico-active';}else{echo 'nav-ico-def';}?>"
                                                  d="M48.859,14.691a1.765,1.765,0,1,0-1.765-1.765,1.767,1.767,0,0,0,1.765,1.765Zm0-2.78a1.014,1.014,0,1,1-1.014,1.014,1.016,1.016,0,0,1,1.014-1.014Z"
                                                  transform="translate(-44.741 -6.74)"/>
                                            <path class="<?php if($pos=='edukasi'){echo 'nav-ico-active';}else{echo 'nav-ico-def';}?>"
                                                  d="M50.223,386.653a1.293,1.293,0,1,0,1.293,1.293A1.295,1.295,0,0,0,50.223,386.653Zm0,1.836a.543.543,0,1,1,.543-.543A.543.543,0,0,1,50.223,388.489Z"
                                                  transform="translate(-46.485 -363.44)"/>
                                            <path class="<?php if($pos=='edukasi'){echo 'nav-ico-active';}else{echo 'nav-ico-def';}?>"
                                                  d="M378.772,408.111a1.728,1.728,0,1,0,1.728,1.728A1.73,1.73,0,0,0,378.772,408.111Zm0,2.7a.977.977,0,1,1,.977-.977A.978.978,0,0,1,378.772,410.815Z"
                                                  transform="translate(-358.179 -383.824)"/>
                                            <path class="<?php if($pos=='edukasi'){echo 'nav-ico-active';}else{echo 'nav-ico-def';}?>"
                                                  d="M187.1,193.548a1.636,1.636,0,1,0-1.636,1.636A1.638,1.638,0,0,0,187.1,193.548Zm-1.636.885a.885.885,0,1,1,.885-.885A.886.886,0,0,1,185.461,194.433Z"
                                                  transform="translate(-174.629 -178.445)"/>
                                            <path class="<?php if($pos=='edukasi'){echo 'nav-ico-active';}else{echo 'nav-ico-def';}?>"
                                                  d="M213.323,280.66a1.233,1.233,0,1,0-1.233-1.233A1.235,1.235,0,0,0,213.323,280.66Zm0-1.716a.483.483,0,1,1-.483.483A.483.483,0,0,1,213.323,278.944Z"
                                                  transform="translate(-201.48 -260.408)"/>
                                            <path class="<?php if($pos=='edukasi'){echo 'nav-ico-active';}else{echo 'nav-ico-def';}?>"
                                                  d="M268.673,230.693a1.1,1.1,0,1,0,1.1-1.1A1.1,1.1,0,0,0,268.673,230.693Zm1.1-.345a.345.345,0,1,1-.345.345A.346.346,0,0,1,269.769,230.348Z"
                                                  transform="translate(-255.231 -214.244)"/>
                                        </g>
                                    </svg>
                                </div>
                                <div class="f16 <?php if($pos=='edukasi'){echo ' nav-font-active';}else{echo ' nav-font-def ';}?> align-self-center ml7">Edukasi</div>
                            </div>
                        </a>
                        <!--Artikel-->
                        <a class="a-none d-none" href="artikel">
                            <div class="pr10 pl10 pt12 pb12 d-flex flex-nowrap nav-hover">
                                <div  style="height:25.6px;" class="justify-content-center d-flex flex-column">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24.971" height="24.97" viewBox="0 0 24.971 24.97">
                                        <defs>
                                            <style>.<?php if($pos=='artikel'){echo 'nav-ico-active';}else{echo 'nav-ico-def';}?>{stroke-width:0px;}</style>
                                        </defs>
                                        <g transform="translate(0 -0.005)">
                                            <g transform="translate(0 0.005)">
                                                <g transform="translate(0 0)">
                                                    <path class="<?php if($pos=='artikel'){echo 'nav-ico-active';}else{echo 'nav-ico-def';}?>"
                                                          d="M24.186,9.252A2.192,2.192,0,0,0,21.1,9.52L19.02,11.985V4.839a2.2,2.2,0,0,0-.683-1.591L15.558.608A2.186,2.186,0,0,0,14.047,0H2.195A2.2,2.2,0,0,0,0,2.2V22.781a2.2,2.2,0,0,0,2.195,2.195H16.826a2.2,2.2,0,0,0,2.195-2.195v-4l5.436-6.439A2.193,2.193,0,0,0,24.186,9.252ZM14.631,1.746c2.927,2.78,2.719,2.577,2.774,2.649H14.631Zm2.926,21.035a.732.732,0,0,1-.732.732H2.195a.732.732,0,0,1-.732-.732V2.2a.732.732,0,0,1,.732-.732H13.168V5.126a.732.732,0,0,0,.732.732h3.658v7.858l-3.11,3.68a2.206,2.206,0,0,0-.453.9l-.68,2.846a.732.732,0,0,0,1,.841L17,20.82a2.206,2.206,0,0,0,.556-.349Zm-1.74-4.739,1.121.94-.249.3a.734.734,0,0,1-.269.2l-1.342.582.34-1.423a.732.732,0,0,1,.149-.3Zm2.064-.178-1.12-.94,4.044-4.785,1.118.938ZM23.337,11.4l-.471.557-1.117-.937.472-.559a.729.729,0,0,1,1.116.939Z"
                                                          transform="translate(0 -0.005)"/>
                                                </g>
                                            </g>
                                            <g transform="translate(2.926 4.394)">
                                                <path class="<?php if($pos=='artikel'){echo 'nav-ico-active';}else{echo 'nav-ico-def';}?>" d="M68.045,90H60.73a.732.732,0,1,0,0,1.463h7.315a.732.732,0,0,0,0-1.463Z"
                                                      transform="translate(-59.998 -90.003)"/>
                                            </g>
                                            <g transform="translate(2.926 8.832)">
                                                <path class="<?php if($pos=='artikel'){echo 'nav-ico-active';}else{echo 'nav-ico-def';}?>" d="M72.434,181H60.73a.732.732,0,1,0,0,1.463h11.7a.732.732,0,1,0,0-1.463Z"
                                                      transform="translate(-59.998 -181.001)"/>
                                            </g>
                                            <g transform="translate(2.926 13.222)">
                                                <path class="<?php if($pos=='artikel'){echo 'nav-ico-active';}else{echo 'nav-ico-def';}?>" d="M72.434,271H60.73a.732.732,0,0,0,0,1.463h11.7a.732.732,0,0,0,0-1.463Z"
                                                      transform="translate(-59.998 -271)"/>
                                            </g>
                                            <g transform="translate(2.926 17.611)">
                                                <path class="<?php if($pos=='artikel'){echo 'nav-ico-active';}else{echo 'nav-ico-def';}?>" d="M68.045,361H60.73a.732.732,0,1,0,0,1.463h7.315a.732.732,0,1,0,0-1.463Z"
                                                      transform="translate(-59.998 -360.998)"/>
                                            </g>
                                        </g>
                                    </svg>
                                </div>
                                <div class="f16 <?php if($pos=='artikel'){echo ' nav-font-active';}else{echo ' nav-font-def ';}?> align-self-center ml7">Artikel</div>
                            </div>
                        </a>
                        <!--Catatan kaki-->
                        <a class="a-none" href="bantuan?h=catatankaki">
                            <div class="pr10 pl10 pt12 pb12 d-flex flex-nowrap nav-hover">
                                <div  style="height:25.6px;" class="justify-content-center d-flex flex-column">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="25.152" height="20.11" viewBox="0 0 25.152 20.11">
                                        <defs>
                                            <style>.<?php if($pos=='catatankaki'){echo 'nav-ico-active';}else{echo 'nav-ico-def';}?>{stroke-width:0px;}</style>
                                        </defs>
                                        <path class="<?php if($pos=='catatankaki'){echo 'nav-ico-active';}else{echo 'nav-ico-def';}?>"
                                              d="M10.35-119.12v-20.11h4.445v1.052a.658.658,0,0,1-.2.482.7.7,0,0,1-.515.2h-1.5v16.641h1.5a.7.7,0,0,1,.515.2.658.658,0,0,1,.2.482v1.052Zm6.049-4.813a1.667,1.667,0,0,1,.125-.64,1.528,1.528,0,0,1,.347-.52,1.707,1.707,0,0,1,.526-.347,1.634,1.634,0,0,1,.65-.13,1.607,1.607,0,0,1,.64.13,1.64,1.64,0,0,1,.52.347,1.64,1.64,0,0,1,.347.52,1.607,1.607,0,0,1,.13.64,1.6,1.6,0,0,1-.13.645,1.657,1.657,0,0,1-.347.515,1.569,1.569,0,0,1-.52.341,1.667,1.667,0,0,1-.64.125,1.7,1.7,0,0,1-.65-.125,1.632,1.632,0,0,1-.526-.341,1.541,1.541,0,0,1-.347-.515A1.655,1.655,0,0,1,16.4-123.933Zm4.879,0a1.667,1.667,0,0,1,.125-.64,1.528,1.528,0,0,1,.347-.52,1.708,1.708,0,0,1,.526-.347,1.634,1.634,0,0,1,.65-.13,1.607,1.607,0,0,1,.64.13,1.64,1.64,0,0,1,.52.347,1.64,1.64,0,0,1,.347.52,1.607,1.607,0,0,1,.13.64,1.6,1.6,0,0,1-.13.645,1.657,1.657,0,0,1-.347.515,1.569,1.569,0,0,1-.52.341,1.667,1.667,0,0,1-.64.125,1.7,1.7,0,0,1-.65-.125,1.632,1.632,0,0,1-.526-.341,1.541,1.541,0,0,1-.347-.515A1.655,1.655,0,0,1,21.278-123.933Zm4.879,0a1.667,1.667,0,0,1,.125-.64,1.528,1.528,0,0,1,.347-.52,1.707,1.707,0,0,1,.526-.347,1.634,1.634,0,0,1,.65-.13,1.607,1.607,0,0,1,.64.13,1.641,1.641,0,0,1,.52.347,1.641,1.641,0,0,1,.347.52,1.607,1.607,0,0,1,.13.64,1.6,1.6,0,0,1-.13.645,1.657,1.657,0,0,1-.347.515,1.569,1.569,0,0,1-.52.341,1.667,1.667,0,0,1-.64.125,1.7,1.7,0,0,1-.65-.125,1.632,1.632,0,0,1-.526-.341,1.541,1.541,0,0,1-.347-.515A1.655,1.655,0,0,1,26.156-123.933Zm4.9,4.813v-1.052a.658.658,0,0,1,.2-.482.7.7,0,0,1,.515-.2h1.5V-137.5h-1.5a.7.7,0,0,1-.515-.2.658.658,0,0,1-.2-.482v-1.052H35.5v20.11Z"
                                              transform="translate(-10.35 139.23)"/>
                                    </svg>
                                </div>
                                <div class="f16 <?php if($pos=='catatankaki'){echo ' nav-font-active';}else{echo ' nav-font-def ';}?> align-self-center ml7">Catatan Kaki</div>
                            </div>
                        </a>

                    </div>
                    <!--Indonesia case information-->
                    <div class="d-lg-flex d-xl-flex flex-wrap justify-content-center ml20 d-none">
                        <!--INDONESIA-->
                        <div class="pr10 pl10 pt12 pb12 d-flex flex-nowrap">
                            <div  style="height:25.6px;" class="justify-content-center d-flex flex-column">
                                <img src="img/asset/nav/indonesiaflag-lg.svg" alt="bendera Indonesia">
                            </div>
                            <div class="f16 cl-dusty-gray align-self-center ml7">INDONESIA</div>
                        </div>
                        <!--Total-->
                        <div class="pr10 pl10 pt12 pb12 d-flex flex-nowrap">
                            <div  style="height:25.6px;" class="justify-content-center d-flex flex-column">
                                <img src="img/asset/nav/total-lg.svg" alt="total kasus coronavirus indonesa">
                            </div>
                            <div class="f16 font-weight-bold cl-dusty-gray align-self-center ml2"><?php echo $idcase['case'] ?></div>
                        </div>
                        <!--Death-->
                        <div class="pr10 pl10 pt12 pb12 d-flex flex-nowrap">
                            <div  style="height:25.6px;" class="justify-content-center d-flex flex-column">
                                <img src="img/asset/nav/death-lg.svg" alt="total kematian coronavirus indonesa">
                            </div>
                            <div class="f16 font-weight-bold cl-dusty-gray align-self-center ml2"><?php echo $idcase['death'] ?></div>
                        </div>
                        <!--Recovery-->
                        <div class="pr10 pl10 pt12 pb12 d-flex flex-nowrap">
                            <div  style="height:25.6px;" class="justify-content-center d-flex flex-column">
                                <img src="img/asset/nav/recovery-lg.svg" alt="total kesembuhan coronavirus indonesa">
                            </div>
                            <div class="f16 font-weight-bold cl-dusty-gray align-self-center ml2"><?php echo $idcase['recovery'] ?></div>
                        </div>
                        <!--Kasus Aktif-->
                        <div class="pr10 pl10 pt12 pb12 d-flex flex-nowrap">
                            <div  style="height:25.6px;" class="justify-content-center d-flex flex-column">
                                <img src="img/asset/nav/active-lg.svg" alt="total kasus aktif coronavirus indonesa">
                            </div>
                            <div class="f16 font-weight-bold cl-dusty-gray align-self-center ml2"><?php echo $idcase['active'] ?></div>
                        </div>
                    </div>
                </div>
            </div>

            <!--Navbar for mobile devices-->
            <div class="col-12 justify-content-center d-block d-md-none d-lg-none d-xl-none">
                <!--Navigation-->
                <div class="d-flex flex-wrap justify-content-between">
                    <!--Home-->
                    <a class="a-none" href="https://sehatdirumah.com">
                        <div class="pr15 pl15 pt17 pb17 d-flex flex-wrap nav-hover flex-column text-center">
                            <div  style="height:50px;" class="justify-content-center d-flex flex-column">
                                <div class="d-flex flex-row justify-content-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" height="50" viewBox="0 0 25.019 24.246">
                                        <defs>
                                            <style>.<?php if($pos=='home'){echo 'nav-ico-active';}else{echo 'nav-ico-def';}?>{stroke-width:0px;}</style>
                                        </defs>
                                        <g transform="translate(-0.001 -0.068)">
                                            <g transform="translate(0.001 0.068)">
                                                <g transform="translate(0 0)">
                                                    <path class="<?php if($pos=='home'){echo 'nav-ico-active';}else{echo 'nav-ico-def';}?>"
                                                          d="M25.013,10.556A2.1,2.1,0,0,0,24.252,9.1L22.088,7.3V2.194a.722.722,0,0,0-.733-.71H18.423a.714.714,0,0,0-.723.71V3.649L13.99.585a2.24,2.24,0,0,0-2.86,0L.769,9.1a2.086,2.086,0,0,0-.238,3.007,2.268,2.268,0,0,0,2.412.621V23.6a.714.714,0,0,0,.723.71H21.355a.722.722,0,0,0,.733-.71V12.729a2.243,2.243,0,0,0,2.4-.622A2.077,2.077,0,0,0,25.013,10.556ZM19.156,2.9h1.476V6.085L19.156,4.867ZM15.5,22.893H9.53V17.2H15.5Zm5.131,0H16.957V16.5a.722.722,0,0,0-.733-.71H8.8a.714.714,0,0,0-.723.71v6.394H4.4V11.707L12.557,5l8.075,6.7V22.893Zm2.746-11.711a.749.749,0,0,1-1.034.077L13.036,3.526a.751.751,0,0,0-.951,0L2.678,11.259a.752.752,0,0,1-1.034-.077.7.7,0,0,1,.077-1L12.082,1.664a.747.747,0,0,1,.954,0L23.3,10.18A.7.7,0,0,1,23.377,11.182Z"
                                                          transform="translate(-0.001 -0.068)"/>
                                                </g>
                                            </g>
                                            <g transform="translate(9.631 8.588)">
                                                <path class="<?php if($pos=='home'){echo 'nav-ico-active';}else{echo 'nav-ico-def';}?>"
                                                      d="M200.266,179.938h-4.358a.7.7,0,0,0-.7.71v4.263a.7.7,0,0,0,.7.71h4.358a.711.711,0,0,0,.71-.71v-4.263A.71.71,0,0,0,200.266,179.938Zm-.7,4.263h-2.946v-2.842h2.946Z"
                                                      transform="translate(-195.207 -179.938)"/>
                                            </g>
                                            <g transform="translate(12.583 18.63)">
                                                <circle class="<?php if($pos=='home'){echo 'nav-ico-active';}else{echo 'nav-ico-def';}?>" cx="0.71" cy="0.71" r="0.71"/>
                                            </g>
                                        </g>
                                    </svg>
                                </div>
                            </div>
                            <div class="f24 <?php if($pos=='home'){echo ' nav-font-active';}else{echo ' nav-font-def ';}?> align-self-center">Home</div>
                        </div>
                    </a>
                    <!--Region-->
                    <a class="a-none" href="region">
                        <div class="pr15 pl15 pt17 pb17 d-flex flex-wrap nav-hover flex-column text-center">
                            <div  style="height:50px;" class="justify-content-center d-flex flex-column">
                                <div class="d-flex flex-row justify-content-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" height="50" viewBox="0 0 15.064 25.273">
                                        <defs>
                                            <style>.<?php if($pos=='region'){echo 'nav-ico-active';}else{echo 'nav-ico-def';}?>{stroke-width:0.2px;}</style>
                                        </defs>
                                        <g transform="translate(-103.968 0.101)">
                                            <path class="<?php if($pos=='region'){echo 'nav-ico-active';}else{echo 'nav-ico-def';}?>"
                                                  d="M147.593,308.7h-9.06l.509-5.279a.392.392,0,0,0-.781-.075l-.517,5.354h-2.733a.392.392,0,1,0,0,.785H147.2v.678h-.488a2.653,2.653,0,0,0-2.62,2.256h-.483a.392.392,0,1,0,0,.785h.847a.392.392,0,0,0,.392-.392,1.866,1.866,0,0,1,1.864-1.864h.88a.392.392,0,0,0,.392-.392v-1.463A.392.392,0,0,0,147.593,308.7Z"
                                                  transform="translate(-29.053 -288.132)"/>
                                            <path class="<?php if($pos=='region'){echo 'nav-ico-active';}else{echo 'nav-ico-def';}?>"
                                                  d="M113.069,423.122H107.96a2.653,2.653,0,0,0-2.62-2.256h-.488V419.8a.392.392,0,1,0-.785,0v1.463a.392.392,0,0,0,.392.392h.88a1.866,1.866,0,0,1,1.864,1.864.392.392,0,0,0,.392.392h5.473a.392.392,0,1,0,0-.785Z"
                                                  transform="translate(0 -398.835)"/>
                                            <path class="<?php if($pos=='region'){echo 'nav-ico-active';}else{echo 'nav-ico-def';}?>"
                                                  d="M200.386,5.819a.392.392,0,0,0,.355.226.191.191,0,0,1,.14.061c.087.093.09-.251-.55,6.379a.392.392,0,1,0,.781.075c.631-6.544.6-6.251.6-6.261a.977.977,0,0,0-.708-1l-.385-.822H204.1l-.385.822A.976.976,0,0,0,203,6.311L204.3,19.7a.392.392,0,1,0,.781-.075C203.7,5.33,203.758,6.21,203.823,6.122a.191.191,0,0,1,.155-.078.392.392,0,0,0,.355-.226l.736-1.569a.393.393,0,0,0-.355-.559h-.468a3.447,3.447,0,0,0-.03-1.568.392.392,0,1,0-.76.194,2.672,2.672,0,0,1-.007,1.337h-2.177a2.509,2.509,0,0,1,1.088-2.82,2.225,2.225,0,0,1,.6.506.392.392,0,0,0,.6-.5,2.982,2.982,0,0,0-1.04-.8.392.392,0,0,0-.326,0,3.253,3.253,0,0,0-1.722,3.654h-.468a.393.393,0,0,0-.355.559Z"
                                                  transform="translate(-90.86)"/>
                                            <path class="<?php if($pos=='region'){echo 'nav-ico-active';}else{echo 'nav-ico-def';}?>" d="M211.076,272.706l-.038.392a.392.392,0,1,0,.781.075l.038-.392a.392.392,0,1,0-.781-.075Z"
                                                  transform="translate(-101.723 -258.995)"/>
                                        </g>
                                    </svg>
                                </div>

                            </div>
                            <div class="f24 <?php if($pos=='region'){echo ' nav-font-active';}else{echo ' nav-font-def ';}?> align-self-center ml7">Region</div>
                        </div>
                    </a>
                    <!--Peringkat-->
                    <a class="a-none" href="peringkat">
                        <div class="pr15 pl15 pt17 pb17 d-flex flex-wrap nav-hover flex-column text-center">
                            <div  style="height:50px;" class="justify-content-center d-flex flex-column">
                                <div class="d-flex flex-row justify-content-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" height="50" viewBox="0 0 24.991 24.991">
                                        <defs>
                                            <style>.<?php if($pos=='peringkat'){echo 'nav-ico-active';}else{echo 'nav-ico-def';}?>{stroke-width:0px;}</style>
                                        </defs>
                                        <g transform="translate(0 23.95)">
                                            <path class="<?php if($pos=='peringkat'){echo 'nav-ico-active';}else{echo 'nav-ico-def';}?>" d="M24.47,490.667H.521a.521.521,0,1,0,0,1.041H24.47a.521.521,0,1,0,0-1.041Z"
                                                  transform="translate(0 -490.667)"/>
                                        </g>
                                        <g transform="translate(1.041 17.702)">
                                            <path class="<?php if($pos=='peringkat'){echo 'nav-ico-active';}else{echo 'nav-ico-def';}?>"
                                                  d="M24.978,362.667H21.854a.521.521,0,0,0-.521.521v6.248a.521.521,0,0,0,.521.521h3.124a.521.521,0,0,0,.521-.521v-6.248A.521.521,0,0,0,24.978,362.667Zm-.521,6.248H22.374v-5.206h2.083v5.206Z"
                                                  transform="translate(-21.333 -362.667)"/>
                                        </g>
                                        <g transform="translate(7.289 12.495)">
                                            <path class="<?php if($pos=='peringkat'){echo 'nav-ico-active';}else{echo 'nav-ico-def';}?>"
                                                  d="M152.978,256h-3.124a.521.521,0,0,0-.521.521v11.454a.521.521,0,0,0,.521.521h3.124a.521.521,0,0,0,.521-.521V256.521A.521.521,0,0,0,152.978,256Zm-.521,11.454h-2.083V257.041h2.083Z"
                                                  transform="translate(-149.333 -256)"/>
                                        </g>
                                        <g transform="translate(13.537 14.578)">
                                            <path class="<?php if($pos=='peringkat'){echo 'nav-ico-active';}else{echo 'nav-ico-def';}?>"
                                                  d="M280.978,298.667h-3.124a.521.521,0,0,0-.521.521v9.372a.521.521,0,0,0,.521.521h3.124a.521.521,0,0,0,.521-.521v-9.372A.521.521,0,0,0,280.978,298.667Zm-.521,9.372h-2.083v-8.33h2.083Z"
                                                  transform="translate(-277.333 -298.667)"/>
                                        </g>
                                        <g transform="translate(19.785 8.33)">
                                            <path class="<?php if($pos=='peringkat'){echo 'nav-ico-active';}else{echo 'nav-ico-def';}?>"
                                                  d="M408.978,170.667h-3.124a.521.521,0,0,0-.521.521v15.619a.521.521,0,0,0,.521.521h3.124a.521.521,0,0,0,.521-.521V171.188A.521.521,0,0,0,408.978,170.667Zm-.521,15.619h-2.083V171.708h2.083Z"
                                                  transform="translate(-405.333 -170.667)"/>
                                        </g>
                                        <g transform="translate(1.041 9.372)">
                                            <path class="<?php if($pos=='peringkat'){echo 'nav-ico-active';}else{echo 'nav-ico-def';}?>"
                                                  d="M23.416,192a2.083,2.083,0,1,0,2.083,2.083A2.085,2.085,0,0,0,23.416,192Zm0,3.124a1.041,1.041,0,1,1,1.041-1.041A1.042,1.042,0,0,1,23.416,195.124Z"
                                                  transform="translate(-21.333 -192)"/>
                                        </g>
                                        <g transform="translate(7.289 4.165)">
                                            <path class="<?php if($pos=='peringkat'){echo 'nav-ico-active';}else{echo 'nav-ico-def';}?>"
                                                  d="M151.416,85.333a2.083,2.083,0,1,0,2.083,2.083A2.085,2.085,0,0,0,151.416,85.333Zm0,3.124a1.041,1.041,0,1,1,1.041-1.041A1.042,1.042,0,0,1,151.416,88.457Z"
                                                  transform="translate(-149.333 -85.333)"/>
                                        </g>
                                        <g transform="translate(13.537 6.248)">
                                            <path class="<?php if($pos=='peringkat'){echo 'nav-ico-active';}else{echo 'nav-ico-def';}?>"
                                                  d="M279.416,128a2.083,2.083,0,1,0,2.083,2.083A2.085,2.085,0,0,0,279.416,128Zm0,3.124a1.041,1.041,0,1,1,1.041-1.041A1.042,1.042,0,0,1,279.416,131.124Z"
                                                  transform="translate(-277.333 -128)"/>
                                        </g>
                                        <g transform="translate(19.785)">
                                            <path class="<?php if($pos=='peringkat'){echo 'nav-ico-active';}else{echo 'nav-ico-def';}?>"
                                                  d="M407.416,0A2.083,2.083,0,1,0,409.5,2.083,2.085,2.085,0,0,0,407.416,0Zm0,3.124a1.041,1.041,0,1,1,1.041-1.041A1.042,1.042,0,0,1,407.416,3.124Z"
                                                  transform="translate(-405.333)"/>
                                        </g>
                                        <g transform="translate(16.203 2.665)">
                                            <path class="<?php if($pos=='peringkat'){echo 'nav-ico-active';}else{echo 'nav-ico-def';}?>"
                                                  d="M336.892,54.76a.521.521,0,0,0-.736,0l-4.04,4.04a.521.521,0,0,0,.736.736l4.04-4.04A.521.521,0,0,0,336.892,54.76Z"
                                                  transform="translate(-331.963 -54.608)"/>
                                        </g>
                                        <g transform="translate(10.353 6.154)">
                                            <path class="<?php if($pos=='peringkat'){echo 'nav-ico-active';}else{echo 'nav-ico-def';}?>" d="M216.115,127.053l-3.345-.954a.521.521,0,0,0-.285,1l3.345.954a.521.521,0,0,0,.285-1Z"
                                                  transform="translate(-212.108 -126.078)"/>
                                        </g>
                                        <g transform="translate(3.706 6.7)">
                                            <path class="<?php if($pos=='peringkat'){echo 'nav-ico-active';}else{echo 'nav-ico-def';}?>"
                                                  d="M80.788,137.469a.521.521,0,0,0-.731-.083l-3.926,3.13a.521.521,0,0,0,.325.928.525.525,0,0,0,.324-.112l3.926-3.13A.52.52,0,0,0,80.788,137.469Z"
                                                  transform="translate(-75.935 -137.273)"/>
                                        </g>
                                    </svg>
                                </div>

                            </div>
                            <div class="f24 <?php if($pos=='peringkat'){echo ' nav-font-active';}else{echo ' nav-font-def ';}?> align-self-center ml7">Peringkat</div>
                        </div>
                    </a>
                    <!--Edukasi-->
                    <a class="a-none" href="edukasi">
                        <div class="pr15 pl15 pt17 pb17 d-flex flex-wrap nav-hover flex-column text-center">
                            <div  style="height:50px;" class="justify-content-center d-flex flex-column">
                                <div class="d-flex flex-row justify-content-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" height="50" viewBox="0 0 25.405 25.026">
                                        <defs>
                                            <style>.<?php if($pos=='edukasi'){echo 'nav-ico-active';}else{echo 'nav-ico-def';}?>{stroke-width:0.4px;}</style>
                                        </defs>
                                        <g transform="translate(0.207 -3.835)">
                                            <path class="<?php if($pos=='edukasi'){echo 'nav-ico-active';}else{echo 'nav-ico-def';}?>"
                                                  d="M48.185,15.322a2.444,2.444,0,0,0-.862-1.705,2.235,2.235,0,0,0-1.669-.518,2.392,2.392,0,0,0-1.91,1.4l-.75.066-.74-.207a.186.186,0,0,1-.124-.122,6.944,6.944,0,0,0-.913-1.8l.262-.7.826-.894a1.68,1.68,0,0,0,1.221-.584,1.708,1.708,0,0,0-.054-2.281,1.679,1.679,0,0,0-1.242-.526A1.7,1.7,0,0,0,41,7.993a1.686,1.686,0,0,0-.449,1.223l-.827.894-.693.321a6.947,6.947,0,0,0-3.406-.948l-.453-.722-.16-.794a2.153,2.153,0,0,0,.764-2.124A2.375,2.375,0,0,0,31.518,5.1,2.12,2.12,0,0,0,31.2,6.727a2.24,2.24,0,0,0,1.447,1.629l.176.877-.14.855a6.953,6.953,0,0,0-1.757,1.13l-.519-.092-.587-.443a1.7,1.7,0,1,0-1.345,1.981l.492.371.22.451a.073.073,0,0,1,0,.063,6.894,6.894,0,0,0-.634,2.9c0,.187.008.377.023.565a.078.078,0,0,1-.031.071l-.83.591-.947.3a2.221,2.221,0,0,0-2.059-.352l-.042.015-.012,0a.375.375,0,0,0,.254.706l.018-.006.018-.006a1.472,1.472,0,0,1,1.479.332.375.375,0,0,0,.371.086l1.2-.378a.375.375,0,0,0,.105-.052l.878-.626a.833.833,0,0,0,.343-.743c-.014-.168-.021-.337-.021-.5a6.149,6.149,0,0,1,.565-2.587.821.821,0,0,0-.008-.706l-.26-.532a.375.375,0,0,0-.111-.135l-.707-.533a.375.375,0,0,0-.341-.058.948.948,0,0,1-.859-.145.946.946,0,0,1-.147-1.372.955.955,0,0,1,1.242-.169.943.943,0,0,1,.417.708.375.375,0,0,0,.148.268l.783.59a.375.375,0,0,0,.16.07l.789.141a.375.375,0,0,0,.321-.094,6.211,6.211,0,0,1,1.866-1.2.375.375,0,0,0,.228-.286l.185-1.125a.376.376,0,0,0,0-.135L33.343,7.99a.375.375,0,0,0-.274-.289,1.512,1.512,0,0,1-1.131-1.13,1.375,1.375,0,0,1,.205-1.056,1.626,1.626,0,0,1,2.9.485,1.423,1.423,0,0,1-.649,1.491.375.375,0,0,0-.164.389l.221,1.1a.376.376,0,0,0,.05.125l.542.865a.566.566,0,0,0,.483.267h0a6.2,6.2,0,0,1,3.2.89.566.566,0,0,0,.531.03l.849-.394a.376.376,0,0,0,.118-.086L41.215,9.6a.375.375,0,0,0,.1-.312.945.945,0,0,1,1.619-.8.951.951,0,0,1,.029,1.27.939.939,0,0,1-.787.324.375.375,0,0,0-.3.12l-.991,1.072a.375.375,0,0,0-.076.124l-.322.866a.565.565,0,0,0,.074.531,6.2,6.2,0,0,1,.866,1.674.936.936,0,0,0,.633.606l.806.226a.375.375,0,0,0,.134.012l1.047-.092a.375.375,0,0,0,.322-.251,1.655,1.655,0,0,1,1.368-1.129,1.491,1.491,0,0,1,1.113.347,1.7,1.7,0,0,1,.6,1.187,1.829,1.829,0,0,1-.164.91.375.375,0,1,0,.681.317,2.584,2.584,0,0,0,.232-1.285Z"
                                                  transform="translate(-23.195 0)"/>
                                            <path class="<?php if($pos=='edukasi'){echo 'nav-ico-active';}else{echo 'nav-ico-def';}?>"
                                                  d="M23.1,245.9a1.515,1.515,0,0,1-1.87-.848.375.375,0,0,0-.373-.215l-.983.087a.375.375,0,0,0-.13.036l-.742.358a.935.935,0,0,0-.519.716,6.171,6.171,0,0,1-.352,1.362.932.932,0,0,0,.055.793l.264.472a.375.375,0,0,0,.119.128l.735.493a.375.375,0,0,0,.343.039.948.948,0,0,1,.866.1.946.946,0,0,1,.223,1.362.955.955,0,0,1-1.231.238.944.944,0,0,1-.455-.684.375.375,0,0,0-.163-.26l-.814-.546a.374.374,0,0,0-.164-.061l-.512-.062a.964.964,0,0,0-.784.262,6.247,6.247,0,0,1-1.37.99.965.965,0,0,0-.5.787l-.065,1.038a.375.375,0,0,0,.011.115l.322,1.279a.375.375,0,0,0,.263.27,1.27,1.27,0,0,1,.888.91,1.266,1.266,0,0,1-.954,1.545,1.266,1.266,0,0,1-1.16-2.14.375.375,0,0,0,.1-.36l-.324-1.286a.375.375,0,0,0-.045-.106l-.5-.8a1.1,1.1,0,0,0-.948-.52h0a6.238,6.238,0,0,1-1.208-.118,1.1,1.1,0,0,0-1.02.322l-.661.7a.377.377,0,0,0-.066.1l-.74,1.534a.375.375,0,0,0,0,.329.945.945,0,0,1-1.314,1.241.956.956,0,0,1-.41-1.179.938.938,0,0,1,.662-.564.375.375,0,0,0,.253-.2L8.573,252a.375.375,0,0,0,.034-.111l.146-1.037A.931.931,0,0,0,8.421,250a6.246,6.246,0,0,1-1.412-1.618.932.932,0,0,0-.784-.443l-1.035-.01a.372.372,0,0,0-.116.017l-1.133.357a.375.375,0,0,0-.26.316,1.472,1.472,0,0,1-2.862.294,1.452,1.452,0,0,1,.009-.931.375.375,0,1,0-.71-.244A2.2,2.2,0,0,0,.1,249.147a2.233,2.233,0,0,0,2.118,1.532,2.2,2.2,0,0,0,.662-.1,2.226,2.226,0,0,0,1.5-1.626l.858-.27.976.009a.176.176,0,0,1,.149.082,7,7,0,0,0,1.581,1.812.176.176,0,0,1,.061.161l-.138.979-.647,1.342a1.7,1.7,0,0,0-.27,3.076,1.682,1.682,0,0,0,1.343.141,1.7,1.7,0,0,0,1.02-.882,1.684,1.684,0,0,0,.068-1.31l.641-1.329.62-.655a.355.355,0,0,1,.329-.1,7,7,0,0,0,1.358.132h0a.356.356,0,0,1,.306.166l.469.754.261,1.034a2.008,2.008,0,0,0-.355,1.9,2.034,2.034,0,0,0,1.925,1.388,1.972,1.972,0,0,0,.429-.047,2.017,2.017,0,0,0,1.518-2.461,2.023,2.023,0,0,0-1.2-1.377l-.258-1.025.061-.98a.209.209,0,0,1,.108-.171,7,7,0,0,0,1.534-1.109.217.217,0,0,1,.175-.06l.423.051.61.409a1.7,1.7,0,1,0,1.233-2.052l-.511-.343-.22-.394a.184.184,0,0,1-.009-.156,6.924,6.924,0,0,0,.4-1.528.186.186,0,0,1,.1-.144l.68-.328.667-.059a2.259,2.259,0,0,0,2.659,1.006.375.375,0,0,0-.235-.713Z"
                                                  transform="translate(0 -228.723)"/>
                                            <path class="<?php if($pos=='edukasi'){echo 'nav-ico-active';}else{echo 'nav-ico-def';}?>"
                                                  d="M147.893,146.616a5.258,5.258,0,1,0,1.6.673.375.375,0,1,0-.4.634,4.486,4.486,0,1,1-1.372-.576.375.375,0,1,0,.172-.731Z"
                                                  transform="translate(-134.357 -135.284)"/>
                                            <path class="<?php if($pos=='edukasi'){echo 'nav-ico-active';}else{echo 'nav-ico-def';}?>"
                                                  d="M48.859,14.691a1.765,1.765,0,1,0-1.765-1.765,1.767,1.767,0,0,0,1.765,1.765Zm0-2.78a1.014,1.014,0,1,1-1.014,1.014,1.016,1.016,0,0,1,1.014-1.014Z"
                                                  transform="translate(-44.741 -6.74)"/>
                                            <path class="<?php if($pos=='edukasi'){echo 'nav-ico-active';}else{echo 'nav-ico-def';}?>"
                                                  d="M50.223,386.653a1.293,1.293,0,1,0,1.293,1.293A1.295,1.295,0,0,0,50.223,386.653Zm0,1.836a.543.543,0,1,1,.543-.543A.543.543,0,0,1,50.223,388.489Z"
                                                  transform="translate(-46.485 -363.44)"/>
                                            <path class="<?php if($pos=='edukasi'){echo 'nav-ico-active';}else{echo 'nav-ico-def';}?>"
                                                  d="M378.772,408.111a1.728,1.728,0,1,0,1.728,1.728A1.73,1.73,0,0,0,378.772,408.111Zm0,2.7a.977.977,0,1,1,.977-.977A.978.978,0,0,1,378.772,410.815Z"
                                                  transform="translate(-358.179 -383.824)"/>
                                            <path class="<?php if($pos=='edukasi'){echo 'nav-ico-active';}else{echo 'nav-ico-def';}?>"
                                                  d="M187.1,193.548a1.636,1.636,0,1,0-1.636,1.636A1.638,1.638,0,0,0,187.1,193.548Zm-1.636.885a.885.885,0,1,1,.885-.885A.886.886,0,0,1,185.461,194.433Z"
                                                  transform="translate(-174.629 -178.445)"/>
                                            <path class="<?php if($pos=='edukasi'){echo 'nav-ico-active';}else{echo 'nav-ico-def';}?>"
                                                  d="M213.323,280.66a1.233,1.233,0,1,0-1.233-1.233A1.235,1.235,0,0,0,213.323,280.66Zm0-1.716a.483.483,0,1,1-.483.483A.483.483,0,0,1,213.323,278.944Z"
                                                  transform="translate(-201.48 -260.408)"/>
                                            <path class="<?php if($pos=='edukasi'){echo 'nav-ico-active';}else{echo 'nav-ico-def';}?>"
                                                  d="M268.673,230.693a1.1,1.1,0,1,0,1.1-1.1A1.1,1.1,0,0,0,268.673,230.693Zm1.1-.345a.345.345,0,1,1-.345.345A.346.346,0,0,1,269.769,230.348Z"
                                                  transform="translate(-255.231 -214.244)"/>
                                        </g>
                                    </svg>
                                </div>

                            </div>
                            <div class="f24 <?php if($pos=='edukasi'){echo ' nav-font-active';}else{echo ' nav-font-def ';}?> align-self-center ml7">Edukasi</div>
                        </div>
                    </a>
                    <!--Artikel-->
                    <a class="a-none d-none" href="artikel">
                        <div class="pr15 pl15 pt17 pb17 d-flex flex-wrap nav-hover flex-column text-center">
                            <div  style="height:50px;" class="justify-content-center d-flex flex-column">
                                <div class="d-flex flex-row justify-content-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" height="50" viewBox="0 0 24.971 24.97">
                                        <defs>
                                            <style>.<?php if($pos=='artikel'){echo 'nav-ico-active';}else{echo 'nav-ico-def';}?>{stroke-width:0px;}</style>
                                        </defs>
                                        <g transform="translate(0 -0.005)">
                                            <g transform="translate(0 0.005)">
                                                <g transform="translate(0 0)">
                                                    <path class="<?php if($pos=='artikel'){echo 'nav-ico-active';}else{echo 'nav-ico-def';}?>"
                                                          d="M24.186,9.252A2.192,2.192,0,0,0,21.1,9.52L19.02,11.985V4.839a2.2,2.2,0,0,0-.683-1.591L15.558.608A2.186,2.186,0,0,0,14.047,0H2.195A2.2,2.2,0,0,0,0,2.2V22.781a2.2,2.2,0,0,0,2.195,2.195H16.826a2.2,2.2,0,0,0,2.195-2.195v-4l5.436-6.439A2.193,2.193,0,0,0,24.186,9.252ZM14.631,1.746c2.927,2.78,2.719,2.577,2.774,2.649H14.631Zm2.926,21.035a.732.732,0,0,1-.732.732H2.195a.732.732,0,0,1-.732-.732V2.2a.732.732,0,0,1,.732-.732H13.168V5.126a.732.732,0,0,0,.732.732h3.658v7.858l-3.11,3.68a2.206,2.206,0,0,0-.453.9l-.68,2.846a.732.732,0,0,0,1,.841L17,20.82a2.206,2.206,0,0,0,.556-.349Zm-1.74-4.739,1.121.94-.249.3a.734.734,0,0,1-.269.2l-1.342.582.34-1.423a.732.732,0,0,1,.149-.3Zm2.064-.178-1.12-.94,4.044-4.785,1.118.938ZM23.337,11.4l-.471.557-1.117-.937.472-.559a.729.729,0,0,1,1.116.939Z"
                                                          transform="translate(0 -0.005)"/>
                                                </g>
                                            </g>
                                            <g transform="translate(2.926 4.394)">
                                                <path class="<?php if($pos=='artikel'){echo 'nav-ico-active';}else{echo 'nav-ico-def';}?>" d="M68.045,90H60.73a.732.732,0,1,0,0,1.463h7.315a.732.732,0,0,0,0-1.463Z"
                                                      transform="translate(-59.998 -90.003)"/>
                                            </g>
                                            <g transform="translate(2.926 8.832)">
                                                <path class="<?php if($pos=='artikel'){echo 'nav-ico-active';}else{echo 'nav-ico-def';}?>" d="M72.434,181H60.73a.732.732,0,1,0,0,1.463h11.7a.732.732,0,1,0,0-1.463Z"
                                                      transform="translate(-59.998 -181.001)"/>
                                            </g>
                                            <g transform="translate(2.926 13.222)">
                                                <path class="<?php if($pos=='artikel'){echo 'nav-ico-active';}else{echo 'nav-ico-def';}?>" d="M72.434,271H60.73a.732.732,0,0,0,0,1.463h11.7a.732.732,0,0,0,0-1.463Z"
                                                      transform="translate(-59.998 -271)"/>
                                            </g>
                                            <g transform="translate(2.926 17.611)">
                                                <path class="<?php if($pos=='artikel'){echo 'nav-ico-active';}else{echo 'nav-ico-def';}?>" d="M68.045,361H60.73a.732.732,0,1,0,0,1.463h7.315a.732.732,0,1,0,0-1.463Z"
                                                      transform="translate(-59.998 -360.998)"/>
                                            </g>
                                        </g>
                                    </svg>
                                </div>

                            </div>
                            <div class="f24 <?php if($pos=='artikel'){echo ' nav-font-active';}else{echo ' nav-font-def ';}?> align-self-center ml7">Artikel</div>
                        </div>
                    </a>

                </div>
            </div>
        </div>
    </div>

</nav>

