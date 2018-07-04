<div class="inner_content_w3_agile_info">

    <div id="stocks">

        <div class="row">
            <div id="table" class="col-md-8">
                <table class="table">
                    <tr class="warning">
                        <th>เวลาที่ทำการสั่งซื้อ</th>
                        <th>ดูสินค้า</th>

                    </tr>

                    <tr v-for="item in requestbills">
                        <th>{{item.requestbill_time}}</th>
                        <th>
                            <button v-on:click="view(item.requestbill_pk)" type="button" class="btn btn-info"
                                    data-toggle="modal" data-target="#myModal">
                                ดูสินค้า
                            </button>
                        </th>

                    </tr>
                </table>
            </div>

            <div class="col-lg-4">
                <div id="stockstable">
                    <div v-if="<?php echo $this->session->userdata('department_id')?> == 0 || <?php echo $this->session->userdata('department_id')?> == 1">
                        <table class="table">
                            <tr>
                                <th>แผนก</th>
                                <th>ชื่อสินค้า</th>
                                <th>จำนวนที่เหลือ</th>

                            </tr>

                            <tr v-for="item in stocks">
                                <th>{{item.department_name}}</th>
                                <th>{{item.acc_name}}</th>
                                <th>{{item.number}}</th>

                            </tr>
                        </table>
                    </div>
                    <div v-else>
                        <table class="table">
                            <tr>
                                <th>ชื่อสินค้า</th>
                                <th>จำนวนที่เหลือ</th>

                            </tr>

                            <tr v-for="item in stocks">
                                <th>{{item.acc_name}}</th>
                                <th>{{item.number}}</th>

                            </tr>
                        </table>
                    </div>
                </div>
                <button id="stocksbutton" v-on:click="viewtable()" type="button" class="btn btn-info">
                    ดูสต๊อกสินค้า
                </button>
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
                        <div class="row">
                            <table class="table">
                                <tr class="warning">
                                    <th>ชื่อสินค้า</th>
                                    <th>จำนวน</th>
                                    <th>ราคา</th>
                                    <th>สถานที่</th>
                                    <th>เวลาที่ต้องการ</th>
                                    <th>เพิ่มสินค้าจากสต๊อก</th>

                                </tr>

                                <tr v-for="item in items">
                                    <th>{{item.name}}</th>
                                    <th>{{item.item_number}}</th>
                                    <th>{{item.price}}</th>
                                    <th>{{item.item_place}}</th>
                                    <th>{{item.item_before}}</th>
                                    <th>
                                        <button class="btn btn-primary"
                                                v-on:click="updatenote(item.item_pk,item.requestbill_pk,item.name,item.item_number)">
                                            เพิ่มสินค้าจากสต๊อก
                                        </button>
                                    </th>
                                </tr>
                            </table>

                            <div class="col-md-6" id="edit">
                                <div class="form-group">
                                    <div>
                                        <label>จำนวน</label><br>
                                        <input type="number" min="1" v-model="item_number">
                                    </div>
                                    <div>
                                        <input type="hidden" v-model="note">
                                    </div>
                                    <div>
                                        <input type="hidden" v-model="item_pk">
                                    </div>
                                    <div>
                                        <input type="hidden" v-model="requestbill_pk">
                                    </div>
                                    <div>
                                        <input type="hidden" v-model="item_number_check">
                                    </div>
                                    <br>
                                    <button id="edit" type="button" class="btn btn-primary" v-on:click="knote()">ตกลง
                                    </button>

                                </div>
                            </div>
                        </div>


                    </div>

                    <!-- Modal footer -->
                    <div class="modal-footer">
                        <button v-on:click="billdone()" type="button" class="btn btn-dark" data-dismiss="modal">Close
                        </button>
                    </div>

                </div>
            </div>
        </div>

    </div>

</div>

<script>

    $('#stockstable').hide();
    $('#edit').hide();
    var data = new Vue({
        el: "#stocks",
        data: {
            requestbills: [],
            items: [],
            requestbill_pk: "",
            stocks: [],
            note: "",
            item_number: "",
            acc_name: "",
            item_number_check: ""


        },
        mounted: function () {
            var self = this;
            $.getJSON("<?php echo site_url('QueryJSON/jsonEncodeUnconfirmbills')?>", function (data) {
                self.requestbills = data;
            })
            $.getJSON("<?php echo site_url('QueryJSON/jsonEncodeStocks')?>", function (data) {
                self.stocks = data;
            })


        },
        methods: {

            view: function (requestbill_pk) {

                $.post("<?php echo site_url('QueryJSON/jsonEncodeItemsfromBill')?>", {requestbill_pk: requestbill_pk});
                alert("ดูสินค้า");
                var self = this;
                $.getJSON("<?php echo site_url('QueryJSON/jsonEncodeItems')?>", function (data) {
                    self.items = data;
                });

            },

            billdone: function () {

                $.post("<?php echo site_url('InsertData/getbills')?>");

            },

            update: function (requestbill_pk) {

                $.post("<?php echo site_url('UpdateData/confirmRequestbills')?>", {requestbill_pk: requestbill_pk});
                location.reload();
            },
            viewtable: function () {
                $('#stockstable').show();
                $('#stocksbutton').hide();

            },
            knote: function () {
                this.item_number = parseInt(this.item_number);
                this.item_number_check = parseInt(this.item_number_check);
                if (this.item_number > this.item_number_check || this.item_number < 0) {
                    alert('กรุณาใส่จำนวนที่ถูกต้อง');
                }
                else {
                    alert('เพิ่มหมายเหตุเสร็จสิ้น');
                    $.post("<?php echo site_url('UpdateData/getstocks')?>", {
                        item_pk: this.item_pk,
                        item_number: this.item_number,
                        acc_name: this.acc_name,
                        note: this.note,
                        requestbill_pk: this.requestbill_pk
                    });
                    location.reload();
                }

            },

            updatenote: function (item_pk, requestbill_pk, name, item_number) {
                $('#edit').show();

                this.item_pk = item_pk;
                this.requestbill_pk = requestbill_pk;
                this.note = 'เพิ่มสินค้าจากสต๊อก'
                this.acc_name = name;
                this.item_number_check = item_number;
                this.item_number=item_number;
            }


        }

    })

</script>

