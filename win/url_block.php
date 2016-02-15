<?php
  $servername = "localhost";
  $username = "root";
  $password = "qwerty";
  $dbname = "block";

  $con = mysql_connect($servername,$username,$password) or die (mysql_error("Error connect"));
  mysql_select_db($dbname) or die (mysql_error("Error database"));
  $query_all_data = 'SELECT * FROM `block_url` ORDER BY id DESC';
  $my_result = mysql_query($query_all_data);
?>

<!DOCTYPE html>
<html lang="en">

  <head>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <meta name="generator" content="Bootply" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/styles.css" rel="stylesheet">

    <title>Proxy Web UI:URL Block</title>
    <style type="text/css">
    .dropdownHeight option {
        height: 30px;
    }
    .sameline {
      display:block;
    }
    </style>
  </head>

  <body>

    <?php include ("./modalbar.php");?>
    
    <div class="wrapper">
      <div class="box">
        <div class="row row-offcanvas row-offcanvas-left">
          
          <?php include ("./sidebar.php");?>
        
          <!-- Main Right -->
          <div class="column col-sm-10 col-xs-11" id="main">
              
            <?php include ("./bluebar.php");?>

            <div class="padding">
              <div class="full col-sm-12">
                <div class="row"><!-- Content -->
                  <form action="add_url.php" method="post" name="frm_data">

                    <div class="row">
                      <div class="col-sm-12">
                        <h1 align="center">URL Block</h1> 
                      </div>
                    </div>

                    <div class="row">
                      <div class="col-sm-2 col-sm-offset-3">
                        <h4 align="right">Name :</h4> 
                      </div>
                      <div class="col-sm-3">
                        <input class="form-control" name="name_add" type="text" />
                      </div>
                    </div>

                    <div class="row">
                      <div class="col-sm-2 col-sm-offset-3">
                        <h4 align="right">URL :</h4> 
                      </div>
                      <div class="col-sm-3">
                        <input class="form-control" name="url_add" type="text" placeholder="Ex. : google.com "/>
                      </div>
                    </div>
                    
                    <div class="row">
                      <div class="col-sm-2 col-sm-offset-3">
                        <h4 align="right">Block Time :</h4> 
                      </div>
                      <div class="col-sm-3">
                        <table>
                          <tr>
                            <td>
                              <select class="dropdownHeight" name="hour_start">
                                <option value="00">00</option><option value="01">01</option><option value="02">02</option>
                                <option value="03">03</option><option value="04">04</option><option value="05">05</option>
                                <option value="06">06</option><option value="07">07</option><option value="08">08</option>
                                <option value="09">09</option><option value="10">10</option><option value="11">11</option>
                                <option value="12">12</option><option value="13">13</option><option value="14">14</option>
                                <option value="15">15</option><option value="16">16</option><option value="17">17</option>
                                <option value="18">18</option><option value="19">19</option><option value="20">20</option>
                                <option value="21">21</option><option value="22">22</option><option value="23">23</option>
                              </select>
                            </td>
                            <td>
                              <h4> : </h4>
                            </td>
                            <td>
                              <select class="dropdownHeight" name="min_start">
                                <option value="00">00</option><option value="01">01</option><option value="02">02</option>
                                <option value="03">03</option><option value="04">04</option><option value="05">05</option>
                                <option value="06">06</option><option value="07">07</option><option value="08">08</option>
                                <option value="09">09</option><option value="10">10</option><option value="11">11</option>
                                <option value="12">12</option><option value="13">13</option><option value="14">14</option>
                                <option value="15">15</option><option value="16">16</option><option value="17">17</option>
                                <option value="18">18</option><option value="19">19</option><option value="20">20</option>
                                <option value="21">21</option><option value="22">22</option><option value="23">23</option>
                                <option value="24">24</option><option value="25">25</option><option value="26">26</option>
                                <option value="27">27</option><option value="28">28</option><option value="29">29</option>
                                <option value="30">30</option><option value="31">31</option><option value="32">32</option>
                                <option value="33">33</option><option value="34">34</option><option value="35">35</option>
                                <option value="36">36</option><option value="37">37</option><option value="38">38</option>
                                <option value="39">39</option><option value="40">40</option><option value="41">41</option>
                                <option value="42">42</option><option value="43">43</option><option value="44">44</option>
                                <option value="45">45</option><option value="46">46</option><option value="47">47</option>
                                <option value="48">48</option><option value="49">49</option><option value="50">50</option>
                                <option value="51">51</option><option value="52">52</option><option value="53">53</option>
                                <option value="54">54</option><option value="55">55</option><option value="56">56</option>
                                <option value="57">57</option><option value="58">58</option><option value="59">59</option>
                              </select>
                            </td>
                            <td>
                              <h4> - </h4>
                            </td>
                            <td>
                              <select class="dropdownHeight" name="hour_end">
                                <option value="00">00</option><option value="01">01</option><option value="02">02</option>
                                <option value="03">03</option><option value="04">04</option><option value="05">05</option>
                                <option value="06">06</option><option value="07">07</option><option value="08">08</option>
                                <option value="09">09</option><option value="10">10</option><option value="11">11</option>
                                <option value="12">12</option><option value="13">13</option><option value="14">14</option>
                                <option value="15">15</option><option value="16">16</option><option value="17">17</option>
                                <option value="18">18</option><option value="19">19</option><option value="20">20</option>
                                <option value="21">21</option><option value="22">22</option><option value="23">23</option>
                              </select>
                            </td>
                            <td>
                              <h4> : </h4>
                            </td>
                            <td>
                              <select class="dropdownHeight" name="min_end">
                                <option value="00">00</option><option value="01">01</option><option value="02">02</option>
                                <option value="03">03</option><option value="04">04</option><option value="05">05</option>
                                <option value="06">06</option><option value="07">07</option><option value="08">08</option>
                                <option value="09">09</option><option value="10">10</option><option value="11">11</option>
                                <option value="12">12</option><option value="13">13</option><option value="14">14</option>
                                <option value="15">15</option><option value="16">16</option><option value="17">17</option>
                                <option value="18">18</option><option value="19">19</option><option value="20">20</option>
                                <option value="21">21</option><option value="22">22</option><option value="23">23</option>
                                <option value="24">24</option><option value="25">25</option><option value="26">26</option>
                                <option value="27">27</option><option value="28">28</option><option value="29">29</option>
                                <option value="30">30</option><option value="31">31</option><option value="32">32</option>
                                <option value="33">33</option><option value="34">34</option><option value="35">35</option>
                                <option value="36">36</option><option value="37">37</option><option value="38">38</option>
                                <option value="39">39</option><option value="40">40</option><option value="41">41</option>
                                <option value="42">42</option><option value="43">43</option><option value="44">44</option>
                                <option value="45">45</option><option value="46">46</option><option value="47">47</option>
                                <option value="48">48</option><option value="49">49</option><option value="50">50</option>
                                <option value="51">51</option><option value="52">52</option><option value="53">53</option>
                                <option value="54">54</option><option value="55">55</option><option value="56">56</option>
                                <option value="57">57</option><option value="58">58</option><option value="59">59</option>
                              </select>
                            </td>
                          </tr>
                        </table>             
                      </div>
                    </div>

                    <div class="row">
                      <div class="col-sm-2 col-sm-offset-3">
                        <h4 align="right">Block Day :</h4> 
                      </div>
                      <div class="col-sm-12">
                        <div>
                          <input type="radio" name="dayR" id="everyday" onchange="setDate();" value="SMTWHFA" checked="checked"/>Everyday
                          <input type="radio" name="dayR" id="someday" onchange="setDate();"/>Someday
                        </div>
                        <div>
                          <input type="checkbox" name="day[]" id="S" disabled="disabled" value="S" checked/>Sunday
                          <input type="checkbox" name="day[]" id="M" disabled="disabled" value="M"/>Monday
                          <input type="checkbox" name="day[]" id="T" disabled="disabled" value="T"/>Tuesday
                          <input type="checkbox" name="day[]" id="W" disabled="disabled" value="W"/>Wednesday
                          <input type="checkbox" name="day[]" id="H" disabled="disabled" value="H"/>Thursday
                          <input type="checkbox" name="day[]" id="F" disabled="disabled" value="D"/>Friday
                          <input type="checkbox" name="day[]" id="A" disabled="disabled" value="A"/>Saturday
                        </div> 
                        <script>
                          function setDate()
                          {
                            var el = document.getElementById("someday");
                            if(el.checked)
                              document.getElementById("S").disabled = false;
                            else
                             document.getElementById("S").disabled = true;
                            if(el.checked)
                              document.getElementById("M").disabled = false;
                            else
                             document.getElementById("M").disabled = true;
                            if(el.checked)
                              document.getElementById("T").disabled = false;
                            else
                             document.getElementById("T").disabled = true;
                            if(el.checked)
                              document.getElementById("W").disabled = false;
                            else
                             document.getElementById("W").disabled = true;
                            if(el.checked)
                              document.getElementById("H").disabled = false;
                            else
                             document.getElementById("H").disabled = true;
                            if(el.checked)
                              document.getElementById("F").disabled = false;
                            else
                             document.getElementById("F").disabled = true;
                            if(el.checked)
                              document.getElementById("A").disabled = false;
                            else
                             document.getElementById("A").disabled = true;            
                          } 
                        </script>
                      </div>
                     
                    </div>
                                          
                    <div class="row">
                      <div class="col-sm-1 col-sm-offset-5">
                          <div class="col-sm-1 col-sm-offset-3">
                            <input class="btn btn-primary" type="submit" value="submit">
                          </div>
                      </div>
                    </div>
                  </form>

                  <div class="row">
                    <div class="col-sm-12">
                        <h2 align="center">Display</h2> 
                      </div>
                  </div>
                  
                  <div class="row">
                    <div class="col-sm-11 col-sm-offset-1">
                      <table class="table table-striped">
                        <thead>

                          <?php
                           
                          function table($data){
                            echo '<th><div>';
                            echo "$data";
                            echo '</th></div>';
                          }
                          
                          echo '<tr>';
                                  table("  #  ");
                                  table('<a href=index.php?sort=name>Name</a>');
                                  table('<a href=index.php?sort=hw>URL</a>');
                                  table('<a href=index.php?sort=time>Block Time</a>');
                                  table('<a href=index.php?sort=time>Block Day</a>');
                                  table("Function");
                          echo '</tr>';
                          $i = 1;
                          while($my_row1=mysql_fetch_array($my_result))
                          {
                            echo '<tr>';
                            table("$i");
                            table($my_row1["name"]);
                            table($my_row1["url"]);
                            table($my_row1["time"]);
                            table($my_row1["day"]);
                            table('<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" data-whatever=/oak2/delete_url.php?url='.trim($my_row1["id"]).'>Delete</button>');
                            $i++;
                            echo '</tr>';
                          }
                          
                          mysql_close($con);
                          ?>
                        </thead>
                      </table>
                    </div>
                  </div>
                </div><!--/Content-->

                
                  
                <?php include ("./underbar.php");?>

                <hr>
              </div><!-- /col-12 -->
            </div><!-- /padding -->
          </div><!-- /Main Content -->
        </div>
      </div>
    </div>

    <?php include ("./script.php");?>
 
  </body>
</html>
