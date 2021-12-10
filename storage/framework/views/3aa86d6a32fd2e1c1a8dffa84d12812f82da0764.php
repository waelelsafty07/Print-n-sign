<?php
$flat_colors = collect([
    '#2196f3cc',
    '#ffc107cc',
    '#009688cc',
    '#ff9800cc',
    '#00bcd4cc',
    '#795548cc',
    '#673ab7cc',
    '#ff5722'
]);
?>

<div class="col-12 p-0">

<div class="">

</div>
    <div class="col-12 my-2 px-2 ">
        <div class="col-12  main-box row">
            <div class="col-12  px-3 py-3 ">
                <?php
                $from = Carbon::parse($from);
                $to = Carbon::parse($to);
                ?>
                Statistics <?php echo e($from->diffInDays($to)); ?> days
            </div>
        </div>
     </div>

    <div class="col-12 row p-0">

        <div class="col-12 col-lg-4 p-2">
            <div class="col-12 p-0 main-box">
                <div class="col-12 px-0">
                    <div class="col-12 px-3 py-3">
                    Quick Actions
                    </div>
                    <div class="col-12 divider" style="min-height: 2px;"></div>
                </div>
                <div class="col-12 p-3 row d-flex">
                    
                    <div class="col-4  d-flex justify-content-center align-items-center mb-3 py-2">
                        <a href="<?php echo e(route('home')); ?>" target="_blank">
                            <div class="col-12 p-0 text-center">
                                <span class="fal fa-home font-5"></span> 
                                <div class="col-12 p-0 text-center">
                                    Website
                                </div>
                            </div>
                        </a>
                     </div>
 
                    
                    
                     <div class="col-4 d-flex justify-content-center align-items-center mb-3 py-2">
                        <a href="<?php echo e(route('admin.settings.index')); ?>">
                            <div class="col-12 p-0 text-center">
                                <span class="fal fa-wrench font-5"></span> 
                                <div class="col-12 p-0 text-center">
                                   Settings
                                </div>
                            </div>
                        </a>
                     </div>
                     <div class="col-4 d-flex justify-content-center align-items-center mb-3 py-2">
                        <a href="<?php echo e(route('admin.profile.index')); ?>">
                            <div class="col-12 p-0 text-center">
                                <span class="fal fa-user font-5"></span> 
                                <div class="col-12 p-0 text-center">
                                    Profile
                                </div>
                            </div>
                        </a>
                     </div>
                     <div class="col-4 d-flex justify-content-center align-items-center mb-3 py-2">
                        <a href="<?php echo e(route('admin.profile.index')); ?>">
                            <div class="col-12 p-0 text-center">
                                <span class="fal fa-user-edit font-5"></span> 
                                <div class="col-12 p-0 text-center">
                                   Edite Profile
                                </div>
                            </div>
                        </a>
                     </div> 
                    
                     
                     
                     <div class="col-4 d-flex justify-content-center align-items-center mb-3 py-2">
                        <a href="<?php echo e(route('admin.notifications.index')); ?>">
                            <div class="col-12 p-0 text-center">
                                <span class="fal fa-bells font-5"></span> 
                                <div class="col-12 p-0 text-center">
                                    Notification
                                </div>
                            </div>
                        </a>
                     </div> 
                    
                    <div class="col-4 d-flex justify-content-center align-items-center mb-3 py-2">
                        <a href="#" onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                            <div class="col-12 p-0 text-center">
                                <span class="fal fa-sign-out-alt font-5"></span> 
                                <div class="col-12 p-0 text-center">
                                    Exit
                                </div>
                            </div>
                        </a>
                     </div>
 
                    
                </div>
            </div>
        </div>

        <div class="col-12 col-lg-4 p-2">
            <div class="col-12 p-0 main-box">
                <div class="col-12 px-0">
                    <div class="col-12 px-3 py-3">
                       New User
                    </div>
                    <div class="col-12 divider" style="min-height: 2px;"></div>
                </div>
                <div class="col-12 p-3">
                    <div id="main-chart">
                        
                    </div> 
                </div>
            </div>
        </div>
        <div class="col-12 col-lg-4 p-2">
            <div class="col-12 p-0 main-box">
                <div class="col-12 px-0">
                    <div class="col-12 px-3 py-3">
                    Top Pages Visit
                    </div> 
                    <div class="col-12 divider" style="min-height: 2px;"></div>
                </div>
                <div class="col-12 p-3">
                    <canvas id="ChartTopPages" style="width:100%;max-height:250px"></canvas>
                </div>
            </div>
        </div>
        <div class="col-12 col-lg-2 p-2">
            <div class="col-12 p-0 main-box">
                <div class="col-12 px-0">
                    <div class="col-12 px-3 py-3">
                    Operating systems
                    </div>
                    <div class="col-12 divider" style="min-height: 2px;"></div>
                </div>
                <div class="col-12 p-3">
                    <canvas id="ChartOperatingSystems" style="width:100%;max-height:250px"></canvas>
                </div>
            </div>
        </div>
        <div class="col-12 col-lg-2 p-2">
            <div class="col-12 p-0 main-box">
                <div class="col-12 px-0">
                    <div class="col-12 px-3 py-3">
                    Browsers
                    </div>
                    <div class="col-12 divider" style="min-height: 2px;"></div>
                </div>
                <div class="col-12 p-3">
                    <canvas id="ChartBrowsers" style="width:100%;max-height:250px"></canvas>
                </div>
            </div>
        </div>
        
        
        <div class="col-12 col-lg-2 p-2">
            <div class="col-12 p-0 main-box">
                <div class="col-12 px-0">
                    <div class="col-12 px-3 py-3">
                    top Devices
                    </div>
                    <div class="col-12 divider" style="min-height: 2px;"></div>
                </div>
                <div class="col-12 p-3">
                    <canvas id="ChartDevices" style="width:100%;max-height:250px"></canvas>
                </div>
            </div>
        </div>
    </div> 
    <?php $__env->startSection('scripts'); ?>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
    <script type="text/javascript"> 

    var chart = new ApexCharts(document.querySelector("#main-chart"), {
      chart: {
        height: 280,
        type: "area",

      },
      dataLabels: {
        enabled: false
      },
      series: [
        {
          name: "New Users",
          data: [
            <?php $__currentLoopData = array_reverse($data['new_users']['counts_list']); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $count): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
          "<?php echo e($count); ?>",
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
          ]
          
        }
      ],
      xaxis: {
        categories: [
          
          <?php $__currentLoopData = array_reverse($data['new_users']['days_list']); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $day): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
          "<?php echo e($day); ?>",
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        ]
      }
    }).render();

    //chart.render();

    const ChartBrowsers = new Chart(document.getElementById('ChartBrowsers'), {
        type: 'doughnut',
        data: {
            labels: [
            <?php $__currentLoopData = $data['top_browsers']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $browser): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                "<?php echo e($browser->browser); ?>",
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            ],
            datasets: [{
                label: 'Browser',
                data: [
                <?php $__currentLoopData = $data['top_browsers']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $browser): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    "<?php echo e($browser->count); ?>",
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                ],
                
                backgroundColor:<?php echo json_encode($flat_colors); ?>,
                borderColor: [
                    'transparent',
                ],
                borderWidth: 0
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });
    const ChartOperatingSystems = new Chart(document.getElementById('ChartOperatingSystems'), {
        type: 'polarArea',
        data: {
            labels: [
            <?php $__currentLoopData = $data['top_operating_systems']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $os): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                "<?php echo e($os->operating_system); ?>",
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            ],
            datasets: [{
                label: 'Operating System',
                data: [
                <?php $__currentLoopData = $data['top_operating_systems']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $os): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                "<?php echo e($os->count); ?>",
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                ],
                
                backgroundColor:<?php echo json_encode($flat_colors); ?>,
                borderColor: [
                    'transparent',
                ],
                borderWidth: 0
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });

    const ChartTopPages = new Chart(document.getElementById('ChartTopPages'), {
        type: 'doughnut',
        data: {
            labels: [
            <?php $__currentLoopData = $data['top_pages']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $page): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            "<?php echo e(str_replace(env('APP_URL'),'',$page->url)); ?>",
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            ],
            datasets: [{
                label: 'Pages',
                data: [
                <?php $__currentLoopData = $data['top_pages']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $page): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                "<?php echo e($page->count); ?>",
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                ],
                
                backgroundColor:<?php echo json_encode($flat_colors); ?>,
                borderColor: [
                    'transparent',
                ],
                borderWidth: 0
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });
    const ChartDevices = new Chart(document.getElementById('ChartDevices'), {
        type: 'pie',
        data: {
            labels: [
            <?php $__currentLoopData = $data['top_devices']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $device): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            "<?php echo e($device->device); ?>",
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            ],
            datasets: [{
                label: 'Browsers',
                data: [
                 <?php $__currentLoopData = $data['top_devices']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $device): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                "<?php echo e($device->count); ?>",
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                ],
                
                backgroundColor:<?php echo json_encode($flat_colors); ?>,
                borderColor: [
                    'transparent',
                ],
                borderWidth: 0
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });

    </script> 
    <?php $__env->stopSection(); ?>
</div>
<?php /**PATH /opt/lampp/htdocs/laravel/dashboard/resources/views/livewire/dashboard-statistics.blade.php ENDPATH**/ ?>