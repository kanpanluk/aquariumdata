<div class="inner_content_w3_agile_info">

    <div id="requestbills">

        <div class="row">
            <div id="table" class="col-md-8">
                <table class="table" >
                    <tr>
                        <th>เวลาที่ทำการสั่งซื้อ</th>
                        <th>สถานะการอนุมัติ</th>
                        <th>สถานะการซื้อของ</th>
                        <th>ดูสินค้า</th>
                        <th>ลบ</th>


                    </tr>

                    <tr v-for="item in requestbills">
                        <th>{{item.requestbill_time}}</th>
                        <th>{{item.requestbill_status}}</th>
                        <th>{{item.requestbill_buystatus}}</th>
                        <th>
                            <button v-on:click="view(item.requestbill_pk)" type="button" class="btn btn-secondary" data-toggle="modal" data-target="#myModal">
                                ดูสินค้า
                            </button>
                        </th>
                        <th>
                            <button v-on:click="del(item.requestbill_pk)" class="btn btn-danger" >
                                ลบ
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
                    <div class="row">
                        <div class="modal-body">
                            <div class="col-md-12">
                                <table class="table" >
                                    <tr>
                                        <th>ชื่อสินค้า</th>
                                        <th>จำนวน</th>
                                        <th>ราคา</th>
                                        <th>สถานที่</th>
                                        <th>เวลาที่ต้องการ</th>
                                        <th>หมายเหตุ</th>
                                        <th>แก้ไข</th>
                                        <th>ลบ</th>

                                    </tr>

                                    <tr v-for="item in items">
                                        <th>{{item.name}}</th>
                                        <th>{{item.item_number}}</th>
                                        <th>{{item.price}}</th>
                                        <th>{{item.item_place}}</th>
                                        <th>{{item.item_before}}</th>
                                        <th><button class="btn btn-secondary" v-on:click="viewnote(item.item_pk,item.requestbill_pk)" >ดูหมายเหตุ</button></th>
                                        <th><button class="btn btn-primary" v-on:click="edit(item.item_pk,item.name,item.price,item.item_number,item.item_place,item.item_before)" >แก้ไข</button></th>
                                        <th><button class="btn btn-danger" v-on:click="delitem(item.item_pk)">ลบ</button></th>
                                    </tr>
                                </table>
                            </div>

                            <div class="col-md-6">
                                <div id="edit" class="form-group">
                                    <span>สินค้าที่เลือก:</span>
                                    <select v-model="name">
                                        <option disabled value="">เลือกสินค้า</option>
                                        <option v-for="acc in accs">{{acc.acc_name}}</option>
                                    </select>

                                    <div>
                                        <label>จำนวน</label><br>
                                        <input type="text" v-model="item_number">
                                    </div>

                                    <div>
                                        <label>ราคา</label><br>
                                        <input type="text" v-model="price">
                                    </div>

                                    <div>
                                        <label>สถานที่</label><br>
                                        <input type="text" v-model="item_place">
                                    </div>
                                    <div>
                                        <label>เวลาที่ต้องการ</label><br>
                                        <input type="date" v-model="item_before">
                                    </div>
                                    <br>
                                    <button type="button" class="btn btn-primary"id="edit" v-on:click="update()">แก้ไข</button>

                                </div>
                            </div>

<!--                            <div class="col-md-6">-->
<!---->
<!--                                <table class="table" >-->
<!--                                    <tr>-->
<!--                                        <th>หมายเหตุ</th>-->
<!--                                    </tr>-->
<!---->
<!--                                    <tr v-for="i in note">-->
<!--                                        <th>{{i.note_note}}</th>-->
<!--                                        </tr>-->
<!--                                </table>-->
<!---->
<!--                            </div>-->
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

    $('#insert').show();
    $('#table').show();
    $('#edit').hide();
    $('#form').hide();

    var data = new Vue({
        el : "#requestbills" ,
        data : {
            requestbills : [] ,
            items : [],
            accs : [] ,
            note : [] ,
            requestbill_pk : "" ,
            item_pk : "" ,
            name: "" ,
            price: "" ,
            item_number: "" ,
            item_place: "" ,
            item_before: "" ,



        } ,
        mounted : function () {
            var self=this;
            $.getJSON("<?php echo site_url('QueryJSON/jsonEncodeRequestbills')?>",function (data) {
                self.requestbills = data ;
            })
            $.getJSON("<?php echo site_url('QueryJSON/jsonEncodeAccs')?>",function (data) {
                self.accs = data ;
            })
            $.getJSON("<?php echo site_url('QueryJSON/jsonEncodeNotes')?>",function (data) {
                self.note = data
            });


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
            del : function (requestbill_pk) {
                alert("ทำการลบใบสั่งนี้");
                $.post("<?php echo site_url('DeleteData/deleterequestbills')?>",{requestbill_pk:requestbill_pk});
                location.reload();
            } ,

            delitem : function (item_pk) {

                $.post("<?php echo site_url('DeleteData/deleteitems')?>",{item_pk:item_pk});
                location.reload();
            } ,

            edit : function (item_pk,name,price,item_number,item_place,item_before) {

                $('#insert').hide();
                $('#edit').show();

                this.item_pk=item_pk;
                this.name=name;
                this.price=price;
                this.item_number=item_number;
                this.item_place=item_place;
                this.item_before=item_before;
            } ,

            update : function () {

                $.post("<?php echo site_url('UpdateData/updateitems')?>",{item_pk:this.item_pk,name:this.name,price:this.price,item_number:this.item_number,item_place:this.item_place,item_before:this.item_before});
                location.reload();
            } ,
            billdone : function () {

                $.post("<?php echo site_url('InsertData/getbills')?>");

            } ,

            viewnote : function (item_pk,requestbill_pk) {
                for(var i=0; i < this.note.length; i++) {
                        if(this.note[i].note_note && this.note[i].item_pk == item_pk && this.note[i].requestbill_pk == requestbill_pk){
                            alert(this.note[i].note_note);
                        }
                        else{
                            alert('ไม่มีหมายเหตุ');
                        }
                }

            }


        }

    })

</script>

