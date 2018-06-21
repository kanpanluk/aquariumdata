<div class="inner_content_w3_agile_info">

    <div id="confirmbuyeditems">

        <div class="row">
            <div id="table" class="col-md-8">
                <table class="table" >
                    <tr>
                        <th>เวลาที่ทำการสั่งซื้อ</th>
                        <th>ยืนยันการซื้อสินค้า</th>



                    </tr>

                    <tr v-for="item in requestbills">
                        <th>{{item.requestbill_time}}</th>
                        <th>
                            <button v-on:click="view(item.requestbill_pk)" type="button" class="btn btn-secondary" data-toggle="modal" data-target="#myModal">
                                ยืนยัน
                            </button>
                        </th>


                    </tr>
                </table>
            </div>


        </div>


        <!-- The Modal -->
        <div class="modal" id="myModal">
            <div class="modal-dialog">
                <div class="modal-content">

                    <!-- Modal Header -->
                    <div class="modal-header">
                        <h4 class="modal-title">สินค้าในบิล</h4>

                    </div>

                    <!-- Modal body -->
                    <div class="modal-body">
                        <table class="table" >
                            <tr>
                                <th>ชื่อสินค้า</th>
                                <th>จำนวน</th>
                                <th>ราคา</th>
                                <th>หมายเหตุ</th>

                            </tr>

                            <tr v-for="item in items">
                                <th>{{item.name}}</th>
                                <th>{{item.item_number}}</th>
                                <th>{{item.price}}</th>
                                <th>
                                    <button class="btn btn-primary" v-on:click="updatenote(item.item_pk,item.requestbill_pk)" >
                                        เพิ่มหมายเหตุ
                                    </button>
                                </th>

                            </tr>
                        </table>

                        <div id="addbuyedbill" class="form-group">
                            <div class="row">
                                <div class="col-md-6">
                                    <div>
                                        <label>ราคา</label><br>
                                        <input type="text" v-model="buybill_price">
                                    </div>

                                    <div>
                                        <label>เวลาที่ซื้อ</label><br>
                                        <input type="date" v-model="buybill_time">
                                    </div>

                                    <th> ยืนยันการซื้อสินค้าทั้งหมด
                                        <input type="checkbox" id="checkbox" v-on:click="update(buybill_price,buybill_time)">
                                        <label for="checkbox">false</label>
                                    </th>
                                </div>

                                <div class="col-md-6" id="edit">
                                    <div class="form-group">
                                        <div>
                                            <label>หมายเหตุ</label><br>
                                            <input type="text" v-model="note">
                                        </div>
                                        <div>
                                            <input type="hidden" v-model="item_pk">
                                        </div>
                                        <div>
                                            <input type="hidden" v-model="requestbill_pk">
                                        </div>
                                        <br>
                                        <button id="edit" type="button" class="btn btn-primary" v-on:click="knote()">ตกลง</button>

                                    </div>
                                </div>
                            </div>


                        </div>




                    </div>

                    <!-- Modal footer -->
                    <div class="modal-footer">
                        <button v-on:click="billdone()" type="button" class="btn btn-dark" data-dismiss="modal">Close</button>
                    </div>

                </div>
            </div>
        </div>

    </div>

</div>

<script>
    $('#edit').hide();

    var data = new Vue({

        el : "#confirmbuyeditems" ,
        data : {
            requestbills : [] ,
            items : [],
            requestbill_pk : "" ,
            note : "" ,
            buybill_price : "" ,
            buybill_time : ""

        } ,
        mounted : function () {
            var self=this;
            $.getJSON("<?php echo site_url('QueryJSON/jsonEncodeConfirmbuyeditems')?>",function (data) {
                self.requestbills = data ;
            })


        } ,
        methods : {

            view : function (requestbill_pk) {

                $.post("<?php echo site_url('QueryJSON/jsonEncodeItemsfromBill')?>",{requestbill_pk:requestbill_pk});
                alert("ดูสินค้า");
                var self=this;
                $.getJSON("<?php echo site_url('QueryJSON/jsonEncodeItems')?>",function (data) {
                    self.items = data ;
                });

            } ,

            billdone : function () {

                $.post("<?php echo site_url('InsertData/getbills')?>");

            } ,

            update : function () {
                if(this.buybill_price == "")
                {
                    alert("กรุณาใส่ราคาสินค้า");
                }
                else if(this.buybill_time == "")
                {
                    alert("กรุณาใส่วันที่ที่ซื้อสินค้า");
                }
                else
                {
                    $.post("<?php echo site_url('UpdateData/confirmBuyeditems')?>",{buybill_time:this.buybill_time,buybill_price:this.buybill_price});
                    location.reload();
                }

            } ,

            knote : function () {

                alert('เพิ่มหมายเหตุเสร็จสิ้น');
                $.post("<?php echo site_url('InsertData/getnotes')?>",{note:this.note,requestbill_pk:this.requestbill_pk,item_pk:this.item_pk});
                location.reload();
            } ,
            
            updatenote : function (item_pk,requestbill_pk) {
                $('#edit').show();

                this.item_pk=item_pk;
                this.requestbill_pk=requestbill_pk;
            }
            
            



        }

    })

</script>

