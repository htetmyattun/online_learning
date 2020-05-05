@extends('student.layouts.default')
@section('title','Online Learning System : KBTC')
@section('content')
            <div class="dashboard-background">
                <div class="dashboard-search">
                    <form action="">
                      <input type="text" placeholder="What do you want to learn?" name="search">
                      <button type="submit"><i class="fa fa-search"></i></button>
                    </form>
                    
                </div> 
            </div>
            <div class="container-1 text-center">
                <div class="page-header" id="top">
                    <h1>Welcome to KBTC E-Learning </h1>
                    <p>We collaborate with leading universities and companies</p>
                </div>
                <div class="row">
                    <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 col-6">
                        <div class="card-center ">
                            <div class="icon-card bg-warning">
                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" x="0px" y="0px" viewBox="0 0 100 125" enable-background="new 0 0 100 100" xml:space="preserve"><path d="M65.422,45.17c-0.983,3.057-4.149,4.803-7.096,3.93c-2.948-0.765-4.694-4.039-3.93-7.096  c0.983-3.057,4.149-4.803,7.096-3.93C64.549,39.056,66.296,42.223,65.422,45.17z M64.331,23.553c1.965-0.545,3.056-2.51,2.51-4.476  c-0.545-1.965-2.51-3.056-4.476-2.51c-1.856,0.545-2.948,2.62-2.51,4.476C60.4,23.008,62.366,24.098,64.331,23.553z M37.91,18.968  c-3.93,0.327-6.769,3.821-6.441,7.642c0.437,3.822,3.821,6.66,7.642,6.441c3.93-0.327,6.769-3.821,6.441-7.642  C45.225,21.479,41.731,18.64,37.91,18.968z M16.248,60.523c-0.109-1.092-0.279-1.599-0.062-2.581c0.437-2.402,0-3.276-2.402-4.149  c-0.764-0.219-1.42-0.437-2.184-0.873c-1.965-1.092-2.402-2.293-1.201-4.367c1.965-3.493,4.258-6.987,6.223-10.589  c0.655-1.092,0.437-2.838,0.437-4.258c0-1.528-0.764-3.276-0.437-4.803c0.873-3.057,1.856-6.114,3.166-8.952  c3.057-6.878,8.734-11.027,15.721-12.882c7.97-2.184,16.375-3.057,24.345-0.764C70.443,9.36,82.015,18.639,82.015,31.74  c0,4.367-0.983,9.061-2.838,12.992c-5.35,11.353-6.332,16.594-3.385,28.712c0,0,0,1.092,1.856,4.04c0,0,1.863,2.174,4.373,5.103  c-8.679,7.689-20.087,12.365-32.594,12.365c-3.249,0-6.421-0.323-9.494-0.924c0.401-0.906,0.842-1.952,1.034-3.006  c-0.219-1.201-0.328-2.402-0.655-3.385c-1.092-3.493-2.402-6.987-3.712-10.48c-0.655-1.965-2.402-1.965-4.258-1.746  c-2.838,0.219-5.895,0.655-8.734,0.328c-4.367-0.437-5.35-2.293-5.241-6.659c0.109-1.201-0.219-2.948-0.983-3.821  c-1.528-1.528-0.983-2.62,0-3.93C16.426,61.591,16.248,60.523,16.248,60.523z M54.068,20.496l3.166,0.873  c0,0.219,0.109,0.437,0.109,0.545c0.109,0.219,0.109,0.437,0.219,0.545l-2.293,2.51c0.545,0.873,0.983,1.528,1.746,2.184  l2.838-1.746c0.328,0.219,0.655,0.437,0.983,0.545l0.109,3.276c0.873,0.219,1.747,0.328,2.729,0.328l0.873-3.166  c0.219,0,0.437-0.109,0.545-0.109c0.219-0.109,0.437-0.109,0.545-0.219l2.51,2.293c0.873-0.545,1.528-0.983,2.184-1.746  l-1.746-2.838c0.219-0.328,0.437-0.655,0.545-0.983l3.276-0.109c0.219-0.873,0.328-1.747,0.328-2.729l-3.166-0.764  c0-0.219-0.109-0.437-0.109-0.545c-0.109-0.219-0.109-0.437-0.219-0.545l2.293-2.51c-0.545-0.873-0.983-1.528-1.746-2.184  l-2.838,1.747c-0.328-0.219-0.655-0.437-0.983-0.545l-0.109-3.276c-0.873-0.219-1.747-0.328-2.729-0.328l-0.873,3.166  c-0.219,0-0.437,0.109-0.545,0.109c-0.219,0.109-0.437,0.109-0.545,0.219L58.762,12.2c-0.873,0.545-1.528,0.983-2.184,1.747  l1.746,2.838c-0.219,0.328-0.437,0.655-0.545,0.983h-3.384C54.177,18.64,54.068,19.514,54.068,20.496z M43.477,39.928  c1.31-0.545,2.729-1.092,3.821-2.074l-1.201-3.276c0.983-0.873,1.747-1.747,2.402-2.838l3.493,0.655  c0.655-1.31,0.983-2.729,1.31-4.149l-3.166-1.528c0-0.655,0-1.201,0-1.856c-0.109-0.655-0.219-1.201-0.328-1.747l2.838-2.074  c-0.545-1.31-1.092-2.729-2.074-3.821l-3.276,1.201c-0.873-0.983-1.747-1.746-2.838-2.402l0.655-3.493  c-1.31-0.655-2.729-0.983-4.149-1.31l-1.528,3.166c-0.655,0-1.201,0-1.856,0c-0.655,0.109-1.201,0.219-1.747,0.328l-2.074-2.838  c-1.31,0.545-2.729,1.092-3.821,2.074l1.201,3.276c-0.983,0.873-1.747,1.746-2.402,2.838l-3.493-0.655  c-0.655,1.31-0.983,2.729-1.31,4.149l3.166,1.528c0,0.655,0,1.201,0,1.856c0.109,0.655,0.219,1.201,0.328,1.747l-2.838,2.074  c0.545,1.31,1.092,2.729,2.074,3.821l3.275-1.201c0.873,0.983,1.747,1.747,2.838,2.402l-0.655,3.385  c1.201,0.764,2.73,1.2,4.149,1.419l1.528-3.166c0.655,0,1.201,0,1.856,0c0.655-0.109,1.201-0.219,1.747-0.328L43.477,39.928z   M72.954,51.175l-3.821-3.93c0.109-0.328,0.219-0.545,0.328-0.873c0.109-0.328,0.219-0.655,0.219-0.983l5.131-1.31  c0.109-1.42-0.109-2.838-0.545-4.367l-5.35-0.109c-0.219-0.545-0.545-1.092-0.873-1.528l2.729-4.585  c-0.983-0.983-2.074-1.965-3.385-2.729l-3.93,3.602c-0.328-0.109-0.545-0.219-0.873-0.328c-0.328-0.109-0.655-0.219-0.983-0.219  l-1.31-5.131c-1.42-0.109-2.838,0.109-4.367,0.545v5.567c-0.545,0.219-1.092,0.545-1.528,0.873l-4.585-2.729  c-0.981,0.874-1.856,2.075-2.62,3.277l3.602,3.93c-0.109,0.328-0.219,0.545-0.328,0.873c-0.109,0.328-0.219,0.655-0.219,0.983  l-5.131,1.201c-0.109,1.42,0.109,2.838,0.545,4.367l5.35,0.109c0.219,0.545,0.545,1.092,0.873,1.528l-2.729,4.585  c0.983,0.983,2.074,1.965,3.385,2.729l3.93-3.602c0.328,0.109,0.545,0.219,0.873,0.328c0.328,0.109,0.655,0.219,0.983,0.219  l1.31,5.131c1.42,0.109,2.838-0.109,4.367-0.545l0.109-5.35c0.545-0.219,1.092-0.545,1.528-0.873l4.585,2.729  C71.207,53.577,72.19,52.485,72.954,51.175z"/></svg>
                            </div>
                            <h3>Best Stimulation</h3>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 col-6">
                        <div class="card-center ">
                            <div class="icon-card bg-primary">
                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" x="0px" y="0px" viewBox="0 0 128 160" style="enable-background:new 0 0 128 128;" xml:space="preserve"><path d="M124.5526733,62.0492554l-5.1380615-3.0228882c-0.9478149-0.5575562-2.1978149-0.836853-3.4473267-0.836853  s-2.4995117,0.2792969-3.4472656,0.836853l-5.1382446,3.0228882c-0.4535522,0.2671509-0.8851929,0.6294556-1.2832031,1.050354  L94.8237305,54.359375C94.9282227,53.9165039,95,53.4765625,95,53.0570679V24.3510742  c0-2.2001953-1.5488281-4.9169922-3.4418945-6.0375977L67.4418945,4.0375977C66.4951172,3.477478,65.2476196,3.1972656,64,3.1972656  s-2.4951172,0.2802124-3.4418945,0.840332L36.4418945,18.3134766C34.5488281,19.434082,33,22.1508789,33,24.3510742v28.7059937  c0,0.4194946,0.0717773,0.859436,0.1762695,1.3023071l-11.2748413,8.7402344  c-0.3980103-0.4208984-0.8296509-0.7832031-1.2832031-1.050354l-5.1382446-3.0228882  c-0.9483032-0.5575562-2.1977539-0.836853-3.4472656-0.836853s-2.4990234,0.2792969-3.4472656,0.836853l-5.1381836,3.0228882  C1.5512695,63.164978,0,65.8778687,0,68.078064v6.1611938c0,2.2002563,1.5512695,4.9130249,3.4472656,6.0288086l5.1381836,3.0228882  c0.9482422,0.5576172,2.1977539,0.8369141,3.4472656,0.8369141s2.4989624-0.2792969,3.4472656-0.8369141l5.1382446-3.0228882  c1.8959961-1.1157837,3.4472046-3.8285522,3.4472046-6.0288086V68.078064c0-0.4613647-0.0820313-0.9467773-0.2070313-1.434082  l11.2158203-8.6942749c0.4198608,0.4624023,0.881897,0.8573608,1.3676758,1.1449585l24.1162109,14.2759399  c0.4359741,0.2577515,0.940918,0.449707,1.4750977,0.5888672v20.2597046  c-0.5336914,0.1397095-1.0375977,0.331604-1.4730835,0.5899048l-7.1202393,4.2250977  C51.5479126,100.1566772,50,102.875,50,105.0751953v8.6166992c0,2.2001953,1.5479126,4.9185181,3.4398804,6.0415039  l7.1202393,4.2250977c0.9458008,0.5614624,2.1928101,0.8422852,3.4398804,0.8422852s2.4940796-0.2808228,3.4398804-0.8422852  l7.1202393-4.2250977C76.4520874,118.6104126,78,115.8920898,78,113.6918945v-8.6166992  c0-2.2001953-1.5479126-4.9185181-3.4398804-6.0410156l-7.1202393-4.2250977  c-0.4169922-0.2476196-0.8983765-0.4307251-1.4066772-0.5689087V73.9389648  c0.5087891-0.1381836,0.9912109-0.3212891,1.4086914-0.5683594l24.1162109-14.2759399  c0.4857788-0.2875977,0.9478149-0.6825562,1.3676758-1.1449585l11.2158203,8.6942749  c-0.125,0.4873047-0.2070313,0.9727173-0.2070313,1.434082v6.1611938c0,2.2002563,1.5512085,4.9130249,3.4472046,6.0288086  l5.1382446,3.0228882c0.9477539,0.5576172,2.1977539,0.8369141,3.4472656,0.8369141s2.4995117-0.2792969,3.4473267-0.8369141  l5.1380615-3.0228882C126.4486694,79.1522827,128,76.4395142,128,74.2392578V68.078064  C128,65.8778687,126.4486694,63.164978,124.5526733,62.0492554z M50.003418,62.4740601l-3.8378906-2.2719727  c0.5727539-4.5092163,2.7768555-8.4666748,5.9467773-11.2050171c0.9121094,0.9960938,1.9423828,1.8833008,3.0844727,2.6245117  C52.0742188,54.0531616,50.0244141,58.0039063,50.003418,62.4740601z M64,48.5175781  c-5.6234741,0-10.1821289-4.4727173-10.1821289-9.9887695c0-5.5161133,4.5586548-9.9888306,10.1821289-9.9888306  s10.1821289,4.4727173,10.1821289,9.9888306C74.1821289,44.0448608,69.6234741,48.5175781,64,48.5175781z M77.9970703,62.4746094  c-0.0209961-4.4717407-2.069397-8.4243164-5.1894531-10.8555298c1.1416016-0.7416992,2.1713867-1.6293945,3.0830078-2.625  c3.1689453,2.7382813,5.3720703,6.6973267,5.944397,11.2084961L77.9970703,62.4746094z"/><ellipse cx="64" cy="38.5287933" rx="6.1821289" ry="5.9888"/></svg>
                            </div>
                            <h3>Group Seminars</h3>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 col-6">
                        <div class="card-center ">
                            <div class="icon-card bg-success">
                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" x="0px" y="0px" viewBox="0 0 70 87.5" style="enable-background:new 0 0 70 70;" xml:space="preserve"><path d="M35,68c15.5507812,0,28.2026367-12.65625,28.2026367-28.2138672c0-6.5621948-2.2592163-12.6029663-6.0321655-17.3997192  l2.1815796-2.182312c0.4013672-0.4003906,0.6220703-0.9326172,0.6220703-1.4990234  c0-0.5654297-0.2207031-1.0976562-0.621582-1.4980469l-3.0668945-3.0673828c-0.8291016-0.8300781-2.1787109-0.8300781-3.0087891,0  l-2.3720093,2.3723755c-3.413208-2.3397827-7.3623047-3.9519043-11.6245728-4.6036377V9.6171875h0.796875  c1.1708984,0,2.1235352-0.953125,2.1235352-2.1240234V4.1240234C42.2006836,2.953125,41.2480469,2,40.0771484,2H29.9228516  c-1.1708984,0-2.1235352,0.953125-2.1235352,2.1240234v3.3691406c0,1.1708984,0.9526367,2.1240234,2.1235352,2.1240234h0.796875  v2.2911987c-4.2622681,0.6517334-8.2114258,2.263916-11.6246338,4.6036987l-2.3724365-2.3724365  c-0.8291016-0.8300781-2.1787109-0.828125-3.0087891,0l-3.065918,3.0664062  c-0.4013672,0.4003906-0.6225586,0.9335938-0.6225586,1.4990234c0,0.5664062,0.2211914,1.0996094,0.6220703,1.4990234  l2.1820068,2.182373c-3.7729492,4.796814-6.0321045,10.8375244-6.0321045,17.3996582C6.7973633,55.34375,19.4492188,68,35,68z   M35,66C20.5517578,66,8.7973633,54.2402344,8.7973633,39.7861328c0-14.4482422,11.7543945-26.2021484,26.2026367-26.2021484  s26.2026367,11.7539062,26.2026367,26.2021484C61.2026367,54.2402344,49.4482422,66,35,66z M54.6904297,15.5537109  c0.046875-0.0478516,0.1337891-0.0478516,0.1816406,0l3.0664062,3.0673828c0,0-0.0004883,0.1689453,0,0.1689453  l-2.0581665,2.0584717c-1.0289917-1.1334839-2.1531982-2.1775513-3.3521729-3.1317749L54.6904297,15.5537109z M29.7993164,7.4931641  V4.1240234C29.7993164,4.0556641,29.8544922,4,29.9228516,4h10.1542969c0.0683594,0,0.1235352,0.0556641,0.1235352,0.1240234  v3.3691406c0,0.0683594-0.0551758,0.1240234-0.1235352,0.1240234h-1.7678223  c-0.0102539-0.0003052-0.0187378-0.0058594-0.0290527-0.0058594s-0.0187988,0.0055542-0.0290527,0.0058594h-6.5024414  c-0.0102539-0.0003052-0.0187378-0.0058594-0.0290527-0.0058594s-0.0187988,0.0055542-0.0290527,0.0058594h-1.7678223  C29.8544922,7.6171875,29.7993164,7.5615234,29.7993164,7.4931641z M32.7197266,9.6171875h4.5605469v2.0669556  C36.5272217,11.6235352,35.7683716,11.5839844,35,11.5839844s-1.5272217,0.0395508-2.2802734,0.1001587V9.6171875z   M12.0615234,18.7900391c0,0,0.0004883-0.1689453,0-0.1689453l3.065918-3.0673828  c0.0473633-0.0478516,0.1342773-0.0478516,0.1816406,0l2.1627197,2.1630859  c-1.1989136,0.9541626-2.3231812,1.99823-3.3521118,3.1317139L12.0615234,18.7900391z"/><path d="M58.2483521,39.7596436C58.2339478,26.9526367,47.8104248,16.5371094,35,16.5371094  S11.7660522,26.9526367,11.7516479,39.7596436c-0.0003662,0.0114136-0.0065308,0.020874-0.0065308,0.0323486  c0,0.012085,0.0064697,0.0220947,0.006897,0.0340576C11.7737427,52.6338501,22.1940308,63.046875,35,63.046875  s23.2262573-10.4130249,23.2479858-23.2208252c0.0004272-0.0119629,0.006897-0.0219727,0.006897-0.0340576  C58.2548828,39.7805176,58.2487183,39.7710571,58.2483521,39.7596436z M36,60.9961548v-2.850647c0-0.5527344-0.4477539-1-1-1  s-1,0.4472656-1,1v2.850647c-10.9155884-0.5120239-19.6836548-9.28302-20.1980591-20.2041626h2.8440552c0.5522461,0,1-0.4472656,1-1  s-0.4477539-1-1-1h-2.8446655C14.3103027,27.8718872,23.0806885,19.0996704,34,18.5877686v2.850708c0,0.5527344,0.4477539,1,1,1  s1-0.4472656,1-1v-2.850708c10.9193115,0.5119019,19.6896973,9.2841187,20.1986694,20.2042236h-2.8446655  c-0.5522461,0-1,0.4472656-1,1s0.4477539,1,1,1h2.8440552C55.6836548,51.7131348,46.9155884,60.4841309,36,60.9961548z"/><path d="M36,35.3695679v-7.9017944c0-0.5527344-0.4477539-1-1-1s-1,0.4472656-1,1v7.9017944  c-2.0269165,0.4570312-3.5483398,2.2612915-3.5483398,4.4194946c0,2.5078125,2.0405273,4.5488281,4.5483398,4.5488281  s4.5483398-2.0410156,4.5483398-4.5488281C39.5483398,37.6308594,38.0269165,35.8265991,36,35.3695679z M35,42.3378906  c-1.4052734,0-2.5483398-1.1435547-2.5483398-2.5488281c0-1.3994141,1.1430664-2.5380859,2.5483398-2.5380859  s2.5483398,1.1386719,2.5483398,2.5380859C37.5483398,41.1943359,36.4052734,42.3378906,35,42.3378906z"/></svg>
                            </div>
                            <h3>Analysed Syllabus</h3>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 col-6">
                        <div class="card-center ">
                            <div class="icon-card bg-info">
                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" xml:space="preserve" version="1.1" style="shape-rendering:geometricPrecision;text-rendering:geometricPrecision;image-rendering:optimizeQuality;" viewBox="0 0 30954 37072.5" x="0px" y="0px" fill-rule="evenodd" clip-rule="evenodd"><defs><style type="text/css">
   
                                .fil0 {fill:black}
                               
                              </style></defs><g><path class="fil0" d="M11487 26290c-297,1083 -1039,1422 -1775,1640l-681 0c-265,0 -481,216 -481,481l0 766c0,264 216,481 481,481l10743 0c264,0 481,-217 481,-481l0 -766c0,-265 -217,-481 -481,-481l-780 0c-714,-213 -1469,-531 -1768,-1640l-5739 0zm9602 -14635c-1723,63 -2753,672 -3224,2083 -336,1007 36,1624 -135,2538 -168,897 -905,929 -1077,1625 1697,1794 7626,-447 6206,-5005 1075,-572 2031,-966 2554,-1718 -10,-11 -3505,-2457 -3645,-2530 -443,1282 -598,1418 -679,3007zm9341 -9689c2796,-5607 -6445,2227 -7845,5520 662,1008 2009,2188 3652,2535 1703,-1228 3230,-5955 4193,-8055zm-23272 9890l3751 0c292,0 531,239 531,531l0 5809c0,292 -239,531 -531,531l-3751 0c-292,0 -531,-239 -531,-531l0 -5809c0,-292 239,-531 531,-531zm109 -4717l13313 0 -339 981c-311,900 -506,1428 -626,2104 -603,144 -1150,375 -1627,704l-10721 0c-416,0 -757,-340 -757,-757l0 -2275c0,-416 341,-757 757,-757zm5166 4810l4531 0c-168,241 -318,506 -447,798l-4084 0 0 -798zm0 1836l3752 0c-53,269 -76,529 -78,798l-3674 0 0 -798zm0 1835l3727 0c5,105 4,211 -10,312 -120,127 -293,261 -414,392 -29,31 -57,62 -83,94l-3220 0 0 -798zm0 1835l2666 0 -15 58 -183 740 -2468 0 0 -798zm-10725 -14025l20652 0c-875,1016 -1069,1738 -2241,2368l-17751 0 0 15761 24069 0 0 -7878c373,-297 717,-645 1019,-1081l578 -829c271,-234 527,-503 771,-799l0 12411c0,940 -769,1708 -1708,1708l-25389 0c-939,0 -1708,-768 -1708,-1708l0 -18245c0,-940 769,-1708 1708,-1708zm12695 18807c375,0 679,304 679,679 0,376 -304,680 -679,680 -376,0 -680,-304 -680,-680 0,-375 304,-679 680,-679z"/></g></svg>
                            </div>
                            <h3>Pratical Training</h3>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container text-center">
                <div class="page-header" id="top">
                    <h1>Categories </h1>
                    <p>A card is a flexible and extensible content container. It includes options for headers and footers, a wide variety of content, contextual background colors, and powerful display options.</p>
                </div>
                <div class="card-body">
                    <a href="" class="btn1 btn btn-outline-primary">Programming</a>
                    <a href="" class="btn1 btn btn-outline-secondary">Networking</a>
                    <a href="" class="btn1 btn btn-outline-warning">Cyber Security</a>
                    <a href="" class="btn1 btn btn-outline-success">Embedded System</a>
                    <a href="" class="btn1 btn btn-outline-info">Business IT</a>
                    
                </div>
            </div>
            <div class="container text-center">
                <div class="page-header" id="top">
                    <h1>Courses </h1>
                    <p>A card is a flexible and extensible content container. It includes options for headers and footers, a wide variety of content, contextual background colors, and powerful display options.</p>
                </div>
                <div id="myCarousel" class="carousel slide w-100" data-ride="carousel">
                    <div class="carousel-inner w-100" role="listbox">
                        @isset($first_course)
                        <div class="carousel-item active">
                            <div class="col-lg-4 col-md-6">
                                <div class="product-thumbnail">
                                            <div class="product-img-head">
                                                <div class="product-img">
                                                    <img src="{{ asset($first_course->photo)}}" alt="" class="img-fluid"></div>
                                                <div class="ribbons"></div>
                                                <div class="ribbons-text">New</div>
                                                <div class="">
                                                    <a href="#" class="product-wishlist-btn"><i class="fas fa-heart"></i></a>
                                                </div>
                                            </div>
                                            <div class="product-content">
                                                <div class="product-content-head">
                                                    <h3 class="product-title">{{$first_course->cname}}</h3>
                                                    <p><em>Tr. {{$first_course->lecturer_name}}</em></p>
                                                    <div class="product-rating d-inline-block">
                                                        <i class="las la-star checked" ></i>
                                                        <i class="las la-star checked" ></i>
                                                        <i class="las la-star checked" ></i>
                                                        <i class="las la-star checked" ></i>
                                                        <i class="las la-star" ></i>
                                                    </div>
                                                    <div class="product-price">{{$first_course->discount_price}} Kyats
                                                        <del class="product-del">{{$first_course->price}} Kyats</del>
                                                    </div>
                                                </div>
                                                <div class="product-btn">
                                                    <a href="#" class="btn btn-primary">Enroll Now</a>
                                                    <a href="detail-course/{{$first_course->id}}" class="btn btn-outline-light">Details</a>
                                                    <a href="#" class="btn btn-outline-light"><i class="fa fa-share"></i></a>
                                                </div>
                                            </div>
                                        </div>
                            </div>
                        </div>
                        @endisset
                        @isset($courses)
                        @foreach($courses as $course)
                        <div class="carousel-item">
                            <div class="col-lg-4 col-md-6">
                                <div class="product-thumbnail">
                                            <div class="product-img-head">
                                                <div class="product-img">
                                                    <img src="{{ asset($course->photo)}}" alt="" class="img-fluid"></div>
                                                <div class=""><a href="#" class="product-wishlist-btn"><i class="fas fa-heart"></i></a></div>
                                            </div>
                                            <div class="product-content">
                                                <div class="product-content-head">
                                                    <h3 class="product-title">{{$course->cname}}</h3>
                                                    <p><em>Tr. {{$course->lecturer_name}}</em></p>
                                                    <div class="product-rating d-inline-block">
                                                        <i class="las la-star checked" ></i>
                                                        <i class="las la-star checked" ></i>
                                                        <i class="las la-star checked" ></i>
                                                        <i class="las la-star checked" ></i>
                                                        <i class="las la-star" ></i>
                                                    </div>
                                                    <div class="product-price">{{$course->discount_price}} Kyats
                                                        <del class="product-del">{{$course->price}} Kyats</del>
                                                    </div>
                                                </div>
                                                <div class="product-btn">
                                                    <a href="#" class="btn btn-primary">Enroll Now</a>
                                                    <a href="detail-course/{{$course->id}}" class="btn btn-outline-light">Details</a>
                                                    <a href="#" class="btn btn-outline-light"><i class="fa fa-share"></i></a>
                                                </div>
                                            </div>
                                        </div>
                            </div>
                        </div>
                        @endforeach
                        @endisset
                        
                        
                    </div>
                    <a class="carousel-control-prev w-auto" href="#myCarousel" role="button" data-slide="prev">
                        <i class="fas fa-arrow-circle-left fa-3x text-dark"></i>
                        <span class="sr-only">Prev</span>
                    </a>
                    <a class="carousel-control-next w-auto" href="#myCarousel" role="button" data-slide="next">
                        <i class="fas fa-arrow-circle-right fa-3x text-dark"></i>
                        <span class="sr-only">Next</span>
                    </a>
                </div>
            </div>
            
            <div class="container text-center">
                <div class="page-header" id="top">
                    <h1>Instructers </h1>
                    <p>A card is a flexible and extensible content container. It includes options for headers and footers, a wide variety of content, contextual background colors, and powerful display options.</p>
                </div>
                <div id="myCarousel1" class="carousel slide w-100" data-ride="carousel">
                    <div class="carousel-inner w-100" role="listbox">
                        <div class="carousel-item active">
                            <div class="col-lg-4 col-md-6">
                                <div class="card campaign-card text-center">
                                    <div class="card-body">
                                        <div class="user-avatar text-center d-block">
                                            <img src="{{asset('/images/p1.jpg')}}" alt="User Avatar" class="rounded-circle user-avatar-xxl">
                                        </div>

                                            <div class="campaign-info">
                                                <h3 class="mb-1">Instructer 1</h3>
                                                <div>
                                                    <a href="#" class="badge badge-light mr-1">Software Development</a>
                                                </div>
                                                <p></p>
                                                <div class="">
                                                    <ul class="list-unstyled mb-0">
                                                    <li class="mb-2"><i class="fas fa-fw fa-envelope mr-2"></i>michaelchristy@gmail.com</li>
                                                        
                                                    </ul>
                                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                                                    tempor incididunt ut labore et dolore magna aliqua.</p>
                                                </div>
                                            </div>
                                        </div>
                                </div>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <div class="col-lg-4 col-md-6">
                                <div class="card campaign-card text-center">
                                    <div class="card-body">
                                        <div class="user-avatar text-center d-block">
                                            <img src="{{asset('/images/p2.jpg')}}" alt="User Avatar" class="rounded-circle user-avatar-xxl">
                                        </div>

                                            <div class="campaign-info">
                                                <h3 class="mb-1">Instructer 2</h3>
                                                <div>
                                                    <a href="#" class="badge badge-light mr-1">Software Development</a>
                                                </div>
                                                <p></p>
                                                <div class="">
                                                    <ul class="list-unstyled mb-0">
                                                    <li class="mb-2"><i class="fas fa-fw fa-envelope mr-2"></i>michaelchristy@gmail.com</li>
                                                    
                                                </ul>
                                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                                                    tempor incididunt ut labore et dolore magna aliqua.</p>
                                                </div>
                                               
                                            </div>
                                        </div>
                                    </div>
                                </div>
                        </div>
                        <div class="carousel-item">
                            <div class="col-lg-4 col-md-6">
                                <div class="card campaign-card text-center">
                                    <div class="card-body">
                                        <div class="user-avatar text-center d-block">
                                            <img src="{{asset('/images/p3.jpg')}}" alt="User Avatar" class="rounded-circle user-avatar-xxl">
                                        </div>

                                            <div class="campaign-info">
                                                <h3 class="mb-1">Instructer 3</h3>
                                                <div>
                                                    <a href="#" class="badge badge-light mr-1">Software Development</a>
                                                </div>
                                                <p></p>
                                                <div class="">
                                                    <ul class="list-unstyled mb-0">
                                                    <li class="mb-2"><i class="fas fa-fw fa-envelope mr-2"></i>michaelchristy@gmail.com</li>
                                                   
                                                </ul>
                                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                                                    tempor incididunt ut labore et dolore magna aliqua.</p>
                                                </div>
                                                
                                            </div>
                                        </div>
                                    </div>
                                </div>
                        </div>
                        <div class="carousel-item">
                            <div class="col-lg-4 col-md-6">
                                <div class="card campaign-card text-center">
                                    <div class="card-body">
                                        <div class="user-avatar text-center d-block">
                                            <img src="{{asset('/images/p4.jpg')}}" alt="User Avatar" class="rounded-circle user-avatar-xxl">
                                        </div>

                                            <div class="campaign-info">
                                                <h3 class="mb-1">Instructer 4</h3>
                                                <div>
                                                    <a href="#" class="badge badge-light mr-1">Software Development</a>
                                                </div>
                                                <p></p>
                                                <div class="">
                                                    <ul class="list-unstyled mb-0">
                                                        <li class="mb-2"><i class="fas fa-fw fa-envelope mr-2"></i>michaelchristy@gmail.com</li>
                                                    </ul>
                                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                                                    tempor incididunt ut labore et dolore magna aliqua.</p>
                                                </div>
                                                
                                            </div>
                                        </div>
                                    </div>
                                </div>
                        </div>
                    </div>
                    <a class="carousel-control-prev w-auto" href="#myCarousel1" role="button" data-slide="prev">
                        <i class="fas fa-arrow-circle-left fa-3x text-dark"></i>
                        <span class="sr-only">Prev</span>
                    </a>
                    <a class="carousel-control-next w-auto" href="#myCarousel1" role="button" data-slide="next">
                        <i class="fas fa-arrow-circle-right fa-3x text-dark"></i>
                        <span class="sr-only">Next</span>
                    </a>
                </div>
            </div>
     @include('student.partials.footer')
     @endsection