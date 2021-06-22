<?php 
if( !isset($_GET['mode']) ) {
  header('location: ' . BASE_URL . '?mode=view');
  //echo BASE_URL . '?mode=view';
}
require_once('data_management/weather/weather.php');
require_once('conf.php');
require_once(BASE_DIR . '/data_management/connect/connect.php'); 
?>
                <div class="row clearfix">
                    <div class="col-lg-3 col-md-6 col-sm-12">
                        <div class="widget">
                            <div class="widget-body">
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="state">
                                        <h6>სტუდენტი</h6>
                                        <?php 
                                        $sql = "SELECT student_id FROM students WHERE student_id";
                                        $result = mysqli_query($conn, $sql);
                                        $row = mysqli_num_rows($result);
                                        echo "<h2>" . $row . "</h2>"  ?>
                                    </div>
                                    <div class="icon">
                                        <i class="ik ik-award"></i>
                                    </div>
                                </div>
                            </div>
                             <div class="progress progress-sm">
                                <div class="progress-bar bg-danger" role="progressbar" aria-valuenow="62" aria-valuemin="0" aria-valuemax="100" style="width: 62%;"></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-12">
                        <div class="widget">
                            <div class="widget-body">
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="state">
                                        <h6>მასწავლებელი</h6>
                                        <?php 
                                        $sql = "SELECT teacher_id FROM teachers ORDER BY teacher_id";
                                        $result = mysqli_query($conn, $sql);
                                        $row = mysqli_num_rows($result);
                                        echo "<h2>" . $row . "</h2>"  ?>
                                    </div>
                                    <div class="icon">
                                        <i class="ik ik-thumbs-up"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="progress progress-sm">
                                <div class="progress-bar bg-success" role="progressbar" aria-valuenow="78" aria-valuemin="0" aria-valuemax="100" style="width: 78%;"></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-12">
                        <div class="widget">
                            <div class="widget-body">
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="state">
                                        <h6>ჯგუფები</h6>
                                        <?php 
                                        $sql = "SELECT group_id FROM groups ORDER BY group_id";
                                        $result = mysqli_query($conn, $sql);
                                        $row = mysqli_num_rows($result);
                                        echo "<h2>" . $row . "</h2>"  ?>
                                    </div>
                                    <div class="icon">
                                        <i class="ik ik-calendar"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="progress progress-sm">
                                <div class="progress-bar bg-warning" role="progressbar" aria-valuenow="31" aria-valuemin="0" aria-valuemax="100" style="width: 31%;"></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-12">
                        <div class="widget">
                            <div class="widget-body">
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="state">
                                        
                                <div class="state">
                                
                                <div class="d-flex align-items-center flex-row mt-30">
                                    <div class="p-2 f-50 text-info"><i class="wi wi-day-showers"></i> <span> <?php echo $temperature_in_celcius ?> <sup>°</sup></span></div>
                                    <div class="p-0">
                                    <h5 class="mb-0" id="demo" > თბილისი
                                      </h5><small>თბილისი</small></div>
                                        <script>
                                          var d = new Date();
                                          var weekday = new Array(7);
                                          weekday[0] = "კვირა";
                                          weekday[1] = "ორშაბათი";
                                          weekday[2] = "სამშაბათი";
                                          weekday[3] = "ოთხშაბათი";
                                          weekday[4] = "ხუთშაბათი";
                                          weekday[5] = "პარასკევი";
                                          weekday[6] = "შაბათი";
                                          var n = weekday[d.getDay()];
                                          document.getElementById("demo").innerHTML = n;
                                        </script>
                                </div>
                                
                                <hr>
                                
                            </div>
                        </div>
                       </div>
                            </div>
                            <div class="progress progress-sm">
                                <div class="progress-bar bg-info" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100" style="width: 20%;"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-7">
                        <div class="card" style="min-height: 422px;">
                            <div class="card-header"><h3>აკადემიური მოსწრება</h3></div>
                            <div class="card-body">
                                <div id="c3-donut-chart"></div>
                            </div>
                        </div>
                    </div>
                <!-- <div class="card">
                    <div class="card-body">
                        <table id="advanced_table" class="table">
                            <thead>
                                <tr>
                                    <th class="nosort" width="10">
                                        <label class="custom-control custom-checkbox m-0">
                                            <input type="checkbox" class="custom-control-input" id="selectall" name="" value="option2">
                                            <span class="custom-control-label">&nbsp;</span>
                                        </label>
                                    </th>
                                    <th class="nosort">Avatar</th>
                                    <th>Name</th>
                                    <th>Position</th>
                                    <th>Office</th>
                                    <th>Age</th>
                                    <th>Start date</th>
                                    <th>Salary</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>
                                        <label class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input select_all_child" id="" name="" value="option2">
                                            <span class="custom-control-label">&nbsp;</span>
                                        </label>
                                    </td>
                                    <td><img src="img/users/1.jpg" class="table-user-thumb" alt=""></td>
                                    <td>Tiger Nixon</td>
                                    <td>System Architect</td>
                                    <td>Edinburgh</td>
                                    <td>61</td>
                                    <td>2011/04/25</td>
                                    <td>$320,800</td>
                                </tr>
                                
                            </tbody>
                        </table>
                    </div>
                </div> -->
            </div>
        </div>
    </div>
</div>

