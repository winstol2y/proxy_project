<!DOCTYPE html>
<html lang="en">

  <head>
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600' rel='stylesheet' type='text/css'>
    <link href="//netdna.bootstrapcdn.com/font-awesome/3.1.1/css/font-awesome.css" rel="stylesheet">

    <style>
      body, div, dl, dt, dd, ul, ol, li, h1, h2, h3, h4, h5, h6, pre, form, fieldset, input, textarea, p, blockquote, th, td
      { 
        padding:0;
        margin:0;
      }

      fieldset, img 
      {
        border:0
      }

      ol, ul, li 
      {
        list-style:none
      }

      :focus 
      {
        outline:none
      }

      body,
      input,
      textarea,
      select 
      {
        font-family: 'Open Sans', sans-serif;
        font-size: 16px;
        color: #4c4c4c;
      }
      body 
      {
          background-color:rgb(204,255,204);
      }
      p 
      {
        font-size: 12px;
        width: 150px;
        display: inline-block;
        margin-left: 18px;
      }
      h1 
      {
        font-size: 32px;
        font-weight: 300;
        color: #4c4c4c;
        text-align: center;
        padding-top: 10px;
        margin-bottom: 10px;
      }

      html
      {
        background-color: #gggggg;
      }

      .testbox 
      {
        margin: 20px auto;
        width: 610px; 
        height: 400px; 
        -webkit-border-radius: 8px/7px; 
        -moz-border-radius: 8px/7px; 
        border-radius: 8px/7px; 
        background-color: #ebebeb; 
        -webkit-box-shadow: 1px 2px 5px rgba(0,0,0,.31); 
        -moz-box-shadow: 1px 2px 5px rgba(0,0,0,.31); 
        box-shadow: 1px 2px 5px rgba(0,0,0,.31); 
        border: solid 1px #cbc9c9;
      }

      input[type=radio] 
      {
        visibility: hidden;
      }

      form
      {
        margin: 0 25px;
      }

      label.radio 
      {
        cursor: pointer;
        text-indent: 35px;
        overflow: visible;
        display: inline-block;
        position: relative;
        margin-bottom: 15px;
      }

      label.radio:before 
      {
        background: #3a57af;
        content:'';
        position: absolute;
        top:2px;
        left: 0;
        width: 20px;
        height: 20px;
        border-radius: 100%;
      }

      label.radio:after 
      {
        opacity: 0;
        content: '';
        position: absolute;
        width: 0.5em;
        height: 0.25em;
        background: transparent;
        top: 7.5px;
        left: 4.5px;
        border: 3px solid #ffffff;
        border-top: none;
        border-right: none;

        -webkit-transform: rotate(-45deg);
        -moz-transform: rotate(-45deg);
        -o-transform: rotate(-45deg);
        -ms-transform: rotate(-45deg);
        transform: rotate(-45deg);
      }

      input[type=radio]:checked + label:after 
      {
        opacity: 1;
      }

      hr
      {
        color: #a9a9a9;
        opacity: 0.3;
      }
      input[type=text],input[type=password]
      {
        width: 200px; 
        height: 37px; 
        -webkit-border-radius: 0px 4px 4px 0px/5px 5px 4px 4px; 
        -moz-border-radius: 0px 4px 4px 0px/0px 0px 4px 4px; 
        border-radius: 0px 4px 4px 0px/5px 5px 4px 4px; 
        background-color: #fff; 
        -webkit-box-shadow: 1px 2px 5px rgba(0,0,0,.09); 
        -moz-box-shadow: 1px 2px 5px rgba(0,0,0,.09); 
        box-shadow: 1px 2px 5px rgba(0,0,0,.09); 
        border: solid 1px #cbc9c9;
        margin-left: -4px;
        margin-top: 13px; 
        padding-left: 10px;
      }

      input[type=password]
      {
        margin-bottom: 25px;
      }
      input[type=submit]
      {
        font-size: 14px;
        font-weight: 600;
        color: white;
        padding: 2px 2px 2px 2px;
        margin: 10px 12px 20px 0px;
        display: inline-block;
        float:right;
        text-decoration: none;
        width: 75px; height: 35px; 
        -webkit-border-radius: 5px; 
        -moz-border-radius: 5px; 
        border-radius: 5px; 
        background-color: #3a57af; 

      }

      #icon 
      {
        display: inline-block;
        width: 30px;
        background-color: #3a57af;
        padding: 8px 0px 8px 15px;
        margin-left: 15px;
        -webkit-border-radius: 4px 0px 0px 4px; 
        -moz-border-radius: 4px 0px 0px 4px; 
        border-radius: 4px 0px 0px 4px;
        color: white;
        -webkit-box-shadow: 1px 2px 5px rgba(0,0,0,.09);
        -moz-box-shadow: 1px 2px 5px rgba(0,0,0,.09); 
        box-shadow: 1px 2px 5px rgba(0,0,0,.09); 
        border: solid 0px #cbc9c9;
      }

      .accounttype
      {
        margin-left: 8px;
        margin-top: 20px;
      }

      a.button
      {
        font-size: 14px;
        font-weight: 600;
        color: white;
        padding: 6px 25px 0px 20px;
        margin: 10px 8px 20px 0px;
        display: inline-block;
        float: right;
        text-decoration: none;
        width: 50px; height: 27px; 
        -webkit-border-radius: 5px; 
        -moz-border-radius: 5px; 
        border-radius: 5px; 
        background-color: #3a57af; 
        -webkit-box-shadow: 0 3px rgba(58,87,175,.75); 
        -moz-box-shadow: 0 3px rgba(58,87,175,.75); 
        box-shadow: 0 3px rgba(58,87,175,.75);
        transition: all 0.1s linear 0s; 
        top: 0px;
        position: relative;
      }

      a.button:hover
      {
        top: 3px;
        background-color:#2e458b;
        -webkit-box-shadow: none; 
        -moz-box-shadow: none; 
        box-shadow: none;
      }
    </style>
  </head>

  <body>
    <div class="testbox">
      <h1>WiFi Register</h1>

      <form action="WiFi_Register_add.php" method="post" name="frm_data">
        <hr>
          <div class="accounttype">
            <input type="radio" value="guest" id="radioOne" name="account" checked/>
            <label for="radioOne" class="radio"chec>ผู้ใช้งานทั่วไป</label>

            <input type="radio" value="staff" id="radioTwo" name="account" />
            <label for="radioTwo" class="radio">บุคลากร</label>
          </div>
        <hr>
        <div>
          <label id="icon" for="name"><i class="icon-user "></i></label>
          <input type="text" name="surName" id="name" placeholder="ชื่อ" required/>
            
          <label id="icon" for="name"><i class="icon-user "></i></label>
          <input type="text" name="lastName" id="lastName" placeholder="นามสกุล" required/>
            
          <label id="icon" for="name"><i class="icon-credit-card"></i></label>
          <input type="text" name="people_id" id="people_id" placeholder="เลขประจำตัวประชาชน" required/>
            
          <label id="icon" for="name"><i class="icon-envelope-alt"></i></label>
          <input type="text" name="email" id="email" placeholder="E-Mail (ถ้ามี)"/>
            
          <label id="icon" for="name"><i class="icon-cogs"></i></label>
          <input type="text" name="mac" id="mac" placeholder="Mac Address" required/>
            
          <label id="icon" for="name"><i class="icon-phone"></i></label>
          <input type="text" name="tel" id="tel" placeholder="Tel (เบอร์โทรศัพท์)" required/>
        </div>
          <input class="button" type="submit" value="submit">

          <!--<p>By clicking Register, you agree on our <a href="#">terms and condition</a>.</p>-->
      </form>
    </div>
  </body>
</html>