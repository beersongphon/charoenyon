<?php
include("../connection/connection.php");
?>
<center>
  <h3>การซ่อมรถยนต์</h3>
  <form style="width: 70%; text-align: left;" method="GET" action="">
    <label>ลูกค้า</label>
    <div class="row">
      <div class="col-9">
        <input name="use" value="create_report" hidden>
        <div class="form-group">
          <select id="cus_id" name="cus_id" class="form-control">
            <?php
            //select all customer 
            $sql = "SELECT * FROM customer";
            $result = $conn->query($sql);
            while ($row = $result->fetch_assoc()) {
            ?>
              <option value="<?php echo $row["cus_id"]; ?>" <?php if (isset($_GET["cus_id"]) && $_GET["cus_id"] == $row["cus_id"]) echo 'selected';  ?>>
                <?php echo $row["firstname"], ' ', $row["lastname"]; ?>
              </option>
            <?php

            }
            ?>
          </select>
        </div>
      </div>
      <div class="col-3">
        <button class="btn btn-primary btn-block" type="submit">เลือก</button>
      </div>
    </div>
  </form>
  <?php
  if (isset($_GET['cus_id'])) {
    $cus_id = $_GET['cus_id'];
    $sql = "SELECT 
                car.vin,
                car.car_registration,
                car.model_id,
                car.color,
                car_model.model_id,
                car_model.model_name,
                car_brand.brand_name,
                car_brand.brand_id
                FROM car
                INNER JOIN car_model
                ON car.model_id = car_model.model_id
                INNER JOIN car_brand
                ON car_model.brand_id = car_brand.brand_id
                WHERE car.cus_id = " . $cus_id;
    $result = $conn->query($sql);
    if ($result->num_rows) {
  ?>
      <form style="width: 70%; text-align: left;" method="GET" action="">
        <label>รถยนต์</label>
        <div class="form-group mb-5">
          <select id="vin" name="vin" class="form-control">
            <?php
            while ($row = $result->fetch_assoc()) {
            ?>
              <option value="<?php echo $row["vin"]; ?>">
                <?php echo $row['brand_name'], ' ', $row['model_name'], ' : เลขทะเบียน ', $row['car_registration']; ?>
              </option>
            <?php
            }
            ?>
          </select>
        </div>
        <div id="part">
          <hr />
          <h4 class="mb-2">รายการอะไหล่</h4>
          <div class="row">
            <div class="col-9">
              <div class="form-group">
                <select name="parts_id" id="parts_id" class="form-control">
                  <?php
                  $sql = "SELECT * FROM auto_parts";
                  $result = $conn->query($sql);
                  while ($row = $result->fetch_assoc()) {
                  ?>
                    <option value="<?php echo $row["parts_id"]; ?>"><?php echo $row['parts_name']; ?></option>
                  <?php
                  }
                  ?>
                </select>
              </div>
            </div>
            <div class="col-3">
              <button class="btn btn-primary btn-block" type="button" onclick="search_part_detail()">
                เลือก
              </button>
            </div>
            <center class="col-12 mb-5">
              <div id="part_detail" class="bg-light">
                <!-- show part detail. etc price -->
              </div>
            </center>
          </div>
          <table class="table table-bordered mb-5" id="table_part">
            <tr>
              <th></th>
              <th></th>
              <th>รวม</th>
              <th>
                <input class="form-control" name="part_total" id="part_total" type="text" value="0" readonly />
              </th>
            </tr>
            <tr>
              <th>รายการอะไหล่เปลี่ยน</th>
              <th>จำนวน</th>
              <th>ราคา</th>
              <th>...</th>
            </tr>
          </table>
        </div>
        <div id="paint">
          <hr />
          <h4 class="mb-2">รายการเคาะพ่นสี</h4>
          <div class="row">
            <div class="col-9">
              <div class="form-group">
                <select name="paint_id" id="paint_id" class="form-control">
                  <?php
                  $sql = "SELECT * FROM car_painting";
                  $result = $conn->query($sql);
                  while ($row = $result->fetch_assoc()) {
                  ?>
                    <option value="<?php echo $row["painting_id"]; ?>"><?php echo $row['pt_detail'], ' - ', $row["pt_part"]; ?></option>
                  <?php
                  }
                  ?>
                </select>
              </div>
            </div>
            <div class="col-3">
              <button class="btn btn-primary btn-block" type="button" onclick="search_paint_detail()">
                เลือก
              </button>
            </div>
            <center class="col-12 mb-5">
              <div id="paint_detail" class="bg-light">
                <!-- show part detail. etc price -->
              </div>
            </center>
          </div>
          <table class="table table-bordered mb-5" id="table_paint">
            <tr>
              <th></th>
              <th></th>
              <th>รวม</th>
              <th>
                <input class="form-control" name="paint_total" id="paint_total" type="text" value="0" readonly />
              </th>
            </tr>
            <tr>
              <th>รายการเคาะพ่นสี</th>
              <th>จำนวน</th>
              <th>ราคา</th>
              <th>...</th>
            </tr>
          </table>
        </div>
        <div class="wange">
          <hr />
          <h4 class="mb-2">ค่าแรง</h4>
          <div class="row">
            <div class="col-6">
              <div class="form-group">
                <label>อะไหล่</label>
                <input type="number" name="wage_part" id="wage_part" value="500" class="form-control">
              </div>
            </div>
            <div class="col-6">
              <div class="form-group">
                <label>เคาะพ่นสี</label>
                <input type="number" name="wage_paint" part id="wage_paint" value="500" class="form-control">
              </div>
            </div>
          </div>
          <!-- 
                    <div class="row">
                        <div class="col-9 mb-3">
                            <select id="wage_id" name="wage_id" class="form-control">
                                <?php
                                /*
                                $sql = "SELECT * FROM wage";
                                $result = $conn->query($sql);
                                while ($row = $result->fetch_assoc()) {
                                ?>
                                    <option value="<?php echo $row["wage_id"]; ?>">
                                        <?php echo $row["wage_detail"], '(ราคา ', $row["wage_price"], ')'; ?>
                                    </option>
                                <?php
                                }
                                */
                                ?>
                            </select>
                        </div>
                        <div class="col-3 mb-5">
                            <button class="btn btn-primary btn-block" type="button" onclick="search_wage_detail()">
                                เลือก
                            </button>
                        </div>
                        <center class="col-12 mb-5">
                            <div id="wage_detail" class="bg-light">
                            </div>
                        </center>
                    </div>
                    <table class="table table-bordered mb-5" id="table_wage">
                        <tr>
                            <th></th>
                            <th>รวม</th>
                            <th>
                                <input class="form-control" name="wage_total" id="wage_total" type="number" value="0" readonly disabled />
                            </th>
                        </tr>
                        <tr>
                            <th>รายละเอียด</th>
                            <th>ค่าแรง</th>
                            <th>...</th>
                        </tr>
                    </table>
                    </div>
                        -->
          <div class="insurance">
            <hr />
            <h4 class="mb-3">ประกันภัย</h4>
            <div class="row">
              <div class="col-6">
                <div class="form-group">
                  <label>บริษัท</label>
                  <select id="Insurance_id" name="Insurance_id" class="form-control">
                    <?php
                    $sql = "SELECT * FROM insurance";
                    $result = $conn->query($sql);
                    while ($row = $result->fetch_assoc()) {
                    ?>
                      <option value="<?php echo $row['insurance_id']; ?>">
                        <?php echo $row['name']; ?>
                      </option>
                    <?php
                    }
                    ?>
                  </select>
                </div>
              </div>
              <div class="col-6">
                <div class="form-group">
                  <label>ประเภท</label>
                  <select id="Isr_type_id" name="Isr_type_id" class="form-control">
                    <?php
                    $sql = "SELECT * FROM insurance_type";
                    $result = $conn->query($sql);
                    while ($row = $result->fetch_assoc()) {
                    ?>
                      <option value="<?php echo $row['Isr_type_id']; ?>">
                        <?php echo $row['type']; ?>
                      </option>
                    <?php
                    }
                    ?>
                  </select>
                </div>
              </div>
            </div>
            <!--
                        <div class="form-group">
                            <label>เลขที่กรมธรรน์</label>
                            <input name="insurance_number" id="insurance_number" type="text" placeholder="กรุณากรอกเลขที่กรมธรรน์" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>สถานะ</label>
                            <br />
                            <div class="form-check form-check-inline">
                                <input type="radio" class="form-check-input" name="insurace_status" id="insurance_status" value="รถประกัน">
                                <label class="form-check-label">
                                    รถประกัน
                                </label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input type="radio" class="form-check-input" name="insurace_status" id="insurance_status" value="คู่กรณี">
                                <label class="form-check-label">
                                    คู่กรณี
                                </label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input type="radio" class="form-check-input" name="insurace_status" id="insurance_status" value="รถเงินสด">
                                <label class="form-check-label">
                                    รถเงินสด
                                </label>
                            </div>
                        </div>
                        -->
          </div>
          <div id="form-group" class="mb-5 mt-5">
            <div class="row">
              <div class="col-6 pt-3" style="text-align: right;">
                <h3>รวม</h3>
              </div>
              <div class="col-6">
                <input name="total_repir" id="total_repir" type="text" value="0" class="form-control" readonly style="background-color: white; border: none; font-size: 2em;">
              </div>
            </div>
          </div>
      </form>
      <div>
        <button class="btn btn-primary btn-block" type="button" style="height: 50px;" onclick="confirm()">
          ยืนยัน
        </button>
      </div>
  <?php
    }
  }
  ?>
</center>
<script>
  var part_list = new Array();
  var paint_list = new Array();
  var wage_list = new Array();
  var wage_state = false;
  var wage_old = 0;

  function confirm() {
    var part_data = $('#cus_id, #insurance_id, #wage_id, #part_total').serialize();

    //add car_repir
    $.ajax({
      url: 'query/add_car_repir.php',
      type: 'get',
      data: {
        'vin': $("#vin").val(),
      },
      success: function(repair_id) {
        addInvoicePart(repair_id);
        addInvoicePaint(repair_id);
        setTimeout(function() {
          window.location.replace('admin.php?use=report');
        }, 500);
      }
    });

  }

  function addInvoicePart(repair_id) {
    var part_data = {
      "Insurance_id": $('#Insurance_id').val(),
      "Isr_type_id": $('#Isr_type_id').val(),
      "wage": $('#wage_part').val(),
      "Iv_total": parseInt($('#part_total').val().replace(/"|\,|\./g, '')),
      "repair_id": repair_id
    };
    $.ajax({
      url: 'query/add_invoice_part.php',
      type: 'post',
      data: part_data,
      success: function(Iv_parts_id) {
        addListPart(Iv_parts_id);
      }
    });
  }

  function addListPart(Iv_parts_id) {
    part_list.forEach((element) => {
      let data = {
        "parts_id": element.id,
        "amount": element.amount,
        "total_part": (element.amount * element.price),
        "Iv_parts_id": Iv_parts_id
      };
      $.ajax({
        url: 'query/add_list_part.php',
        type: 'post',
        data: data,
        success: function(value) {
          console.log(`debug add_list_part => ${value}`);
        }
      });
    });
  }


  function addInvoicePaint(repair_id) {
    var paint_data = {
      "Insurance_id": $('#Insurance_id').val(),
      "Isr_type_id": $('#Isr_type_id').val(),
      "wage": $('#wage_paint').val(),
      "Iv_total": parseInt($('#paint_total').val().replace(/"|\,|\./g, '')),
      "repair_id": repair_id
    };
    $.ajax({
      url: 'query/add_invoice_painting.php',
      type: 'post',
      data: paint_data,
      success: function(Iv_paint_id) {
        addListPaint(Iv_paint_id);
      }
    });
  }

  function addListPaint(Iv_paint_id) {
    paint_list.forEach((element) => {
      let data = {
        "painting_id": element.id,
        "amount": element.amount,
        "total_paint": (element.amount * element.price),
        "Iv_paint_id": Iv_paint_id
      };
      $.ajax({
        url: 'query/add_list_paint.php',
        type: 'post',
        data: data,
        success: function(value) {
          console.log(`debug add_list_paint=> ${value}`);
        }
      });
    });
  }

  function report() {
    window.location.replace('admin.php?use=report');
  }

  function add_part() {
    var result = {};
    $.ajax({
      url: 'query/search_parts_detail.php',
      type: 'get',
      dataType: 'json',
      data: {
        'id': $('#parts_id').val()
      },
      success: function(result) {
        result = result;
        var detail = `
                    <tr id="part_row${$('#table_part').children('tr').length + 1}">
                        <td>
                            ${result.parts_name}
                        </td> 
                        <td>
                            ${$('#part_amount').val()}
                        </td> 
                        <td>
                            ${parseInt($('#part_amount').val() * result.parts_price).toLocaleString()}
                        </td> 
                        <td>
                            <button type="button" class="btn btn-danger" onclick="delete_part('${$('#table_part').children('tr').length + 1}', ${result.parts_id})">
                                <i class="fa fa-trash" aria-hidden="true"></i>
                                ลบ
                            </button> 
                        </td>
                    </tr> 
                `;
        //add part when it was not in part_list
        var condition = part_list.findIndex((value) => {
          return value["id"] == $("#parts_id").val();
        });
        if (condition) {
          $('#table_part').append(detail);
          var total = parseInt($('#part_total').val().replace(/"|\,|\./g, ''));
          /*
          $('#part_total').val(`${parseInt(total + parseInt($('#part_amount').val() * result.parts_price)).toLocaleString()}`);
          $('#total_repir').val((parseInt($('#total_repir').val()) + parseInt($('#part_amount').val() * result.parts_price)).toLocaleString());
          */
          $('#part_total').val(`${parseInt(total + parseInt($('#part_amount').val() * result.parts_price)).toLocaleString()}`);
          $('#total_repir').val((parseInt($('#total_repir').val().replace(/"|\,|\./g, '')) + parseInt($('#part_amount').val() * result.parts_price)).toLocaleString());
          part_list.push({
            'id': $('#parts_id').val(),
            'amount': $('#part_amount').val(),
            'price': result.parts_price
          });
          $('#part_detail').html('<div></div>');
        } else {
          alert(`เพิ่มรายการ ${result.parts_name} แล้ว`);
        }
      }
    });
  }

  function add_paint() {
    var result = {};
    $.ajax({
      url: 'query/search_paint_detail.php',
      type: 'get',
      dataType: 'json',
      data: {
        'id': $('#paint_id').val()
      },
      success: function(result) {
        result = result;
        var detail = `
                    <tr id="paint_row${$('#table_paint').children('tr').length + 1}">
                        <td>
                            ${result.pt_detail}
                        </td> 
                        <td>
                            ${$('#paint_amount').val()}
                        </td> 
                        <td>
                            ${($('#paint_amount').val() * result.paint_price).toLocaleString()}
                        </td> 
                        <td>
                            <button type="button" class="btn btn-danger" onclick="delete_paint('${$('#table_paint').children('tr').length + 1}', ${result.paint_id})">
                                <i class="fa fa-trash" aria-hidden="true"></i>
                                ลบ
                            </button> 
                        </td>
                    </tr> 
                `;
        var condition = paint_list.findIndex((value) => {
          return value["id"] == $("#paint_id").val();
        });
        if (condition) {
          $('#table_paint').append(detail);
          var total = parseInt($('#paint_total').val().replace(/"|\,|\./g, ''));
          $('#paint_total').val(`${parseInt(total + parseInt($('#paint_amount').val() * result.paint_price)).toLocaleString()}`);
          $('#total_repir').val((parseInt($('#total_repir').val().replace(/"|\,|\./g, '')) + parseInt($('#paint_amount').val() * result.paint_price)).toLocaleString());
          paint_list.push({
            'id': $('#paint_id').val(),
            'amount': $('#paint_amount').val(),
            'price': result.paint_price
          });
          $('#paint_detail').html('<div></div>');
        } else {
          alert(`เพิ่มรายการ ${result.pt_detail} แล้ว`);
        }
      }
    }).done(function() {});
  }

  function add_wage() {
    var result = {};

    $.ajax({
      url: 'query/search_wage_detail.php',
      type: 'get',
      dataType: 'json',
      data: {
        'id': $('#wage_id').val()
      },
      success: function(result) {
        result = result;
        var detail = `
                    <tr id="wage_row${$('#table_wage').children('tr').length + 1}">
                        <td>
                            ${result.wage_detail}
                        </td> 
                        <td>
                            ${result.wage_price}
                        </td> 
                        <td>
                            <button type="button" class="btn btn-danger" onclick="delete_wage('${$('#table_wage').children('tr').length + 1}', ${result.wage_id})">
                                <i class="fa fa-trash" aria-hidden="true"></i>
                                ลบ
                            </button> 
                        </td>
                    </tr> 
                `;
        var condition = wage_list.findIndex((value) => {
          return value["id"] == $("#wage_id").val();
        });
        if (condition) {
          $('#table_wage').append(detail);
          var total = parseInt($('#wage_total').val());
          $('#wage_total').val(`${total + parseInt(result.wage_price)}`);
          $('#wage_detail').html('<div></div>');
        } else {
          alert(`เพิ่มรายการ ${result.wage_detail} แล้ว`);
        }
      }
    }).done(function() {
      wage_list.push({
        'id': $('#wage_id').val()
      });
    });
  }

  function delete_wage(row, id) {
    $(`#wage_row${row}`).remove();
    wage_list = wage_list.filter((value) => {
      if (value['id'] == id) {
        $.ajax({
          url: 'query/search_wage_detail.php',
          type: 'get',
          dataType: 'json',
          data: {
            'id': id
          },
          success: function(result) {
            var total = parseInt($('#part_total').val().replace(/"|\,|\./g, ''));
            $('#wage_total').val(`${total - parseInt(result.wage_price)}`);
            $('#total_repir').val(`${parseInt($('#total_repir').val()) - parseInt(result.wage_price)}`);
          }
        });
      }
      return value['id'] != id;
    });
  }

  function delete_part(row, id) {
    $(`#part_row${row}`).remove();
    part_list = part_list.filter((value) => {
      if (value['id'] == id) {
        $.ajax({
          url: 'query/search_parts_detail.php',
          type: 'get',
          dataType: 'json',
          data: {
            'id': id
          },
          success: function(result) {
            var total = parseInt($('#part_total').val().replace(/"|\,|\./g, ''));
            $('#part_total').val(`${parseInt(total - (value['amount'] * result.parts_price)).toLocaleString()}`);
            $('#total_repir').val((parseInt($('#total_repir').val().replace(/"|\,|\./g, '')) - (value['amount'] * result.parts_price)).toLocaleString());
          }
        });
      }
      return value['id'] != id;
    });
  }

  function delete_paint(row, id) {
    $(`#paint_row${row}`).remove();
    paint_list = paint_list.filter((value) => {
      if (value['id'] == id) {
        $.ajax({
          url: 'query/search_paint_detail.php',
          type: 'get',
          dataType: 'json',
          data: {
            'id': id
          },
          success: function(result) {
            var total = parseInt($('#paint_total').val().replace(/"|\,|\./g, ''));
            $('#paint_total').val(`${parseInt(total - (value['amount'] * result.paint_price)).toLocaleString()}`);
            $('#total_repir').val((parseInt($('#total_repir').val().replace(/"|\,|\./g, '')) - (value['amount'] * result.paint_price)).toLocaleString());
          }
        });
      }
      return value['id'] != id;
    });
  }

  function search_wage_detail() {
    $.ajax({
      url: 'query/search_wage_detail.php',
      type: 'get',
      dataType: 'json',
      data: {
        'id': $("#wage_id").val()
      },
      success: function(result) {
        /*
        var detail = `
            <table class="table">
                <tr>
                    <th>รายละเอียด</th> 
                    <th>ค่าแรง</th> 
                    <th>...</th>
                </tr>
                <tr>
                    <td id="pt_detail">${result.wage_detail}</td> 
                    <td id="paint_price">${result.wage_price}</td>
                    <td>
                        <button class="btn btn-success mb-2" type="button" onclick="add_wage()">
                            <i class="fa fa-plus-square" aria-hidden="true"></i>
                            เพิ่ม
                        </button>
                    </td>
                </tr>
            </table> 
        `;
        $('#wage_detail').html(detail);
        */
        if (wage_state == false) {
          wage_old = parseInt(result.wage_price);
          $('#total_repir').val(parseInt($('#total_repir').val()) + parseInt(result.wage_price));
        } else {
          $('#total_repir').val(parseInt($('#total_repir').val()) - wage_old);
          $('#total_repir').val(parseInt($('#total_repir').val()) + parseInt(result.wage_price));
          wage_old = parseInt(result.wage_price);
        }
        wage_state = true;
      }
    });
  }

  function search_paint_detail() {
    $.ajax({
      url: 'query/search_paint_detail.php',
      type: 'get',
      dataType: 'json',
      data: {
        'id': $('#paint_id').val()
      },
      success: function(result) {
        var detail = `
                    <table class="table">
                        <tr>
                            <th>รายละเอียด</th> 
                            <th>ส่วน</th> 
                            <th>ราคา</th> 
                            <th>จำนวน</th>
                            <th>...</th>
                        </tr>
                        <tr>
                            <td id="pt_detail">${result.pt_detail}</td> 
                            <td id="pt_part">${result.pt_part}</td>
                            <td id="paint_price">${parseInt(result.paint_price).toLocaleString()}</td>
                            <td>
                                <input class="form-control" id="paint_amount" type="number" placeholder="จำนวน">
                            </td>
                            <td>
                                <button class="btn btn-success mb-2" type="button" onclick="add_paint()">
                                    <i class="fa fa-plus-square" aria-hidden="true"></i>
                                    เพิ่ม
                                </button>
                            </td>
                        </tr>
                    </table> 
                `;
        $('#paint_detail').html(detail);
      }
    });
  }

  function search_part_detail() {
    $.ajax({
      url: 'query/search_parts_detail.php',
      type: 'get',
      dataType: 'json',
      data: {
        'id': $('#parts_id').val()
      },
      success: function(result) {
        var detail = `
                    <table class="table">
                        <tr>
                            <th>บริษัท</th> 
                            <th>ราคา</th> 
                            <th>จำนวน</th>
                            <th>...</th>
                        </tr>
                        <tr>
                            <td id="company_name">${result.company_name}</td> 
                            <td id="price">${parseInt(result.parts_price).toLocaleString()}</td>
                            <td>
                                <input class="form-control" id="part_amount" type="number" placeholder="จำนวน">
                            </td>
                            <td>
                                <button class="btn btn-success mb-2" type="button" onclick="add_part()">
                                    <i class="fa fa-plus-square" aria-hidden="true"></i>
                                    เพิ่ม
                                </button>
                            </td>
                        </tr>
                    </table> 
                `;
        $('#part_detail').html(detail);
      }
    });
  }
</script>