<div class="inner_content_w3_agile_info">
<?php //echo $this->session->userdata('department_pk')?>
    <div id="item">

        <div class="row">
            <div class="col-md-8">
                <table class="table" >
                    <tr>
                        <th>ชื่อสินค้า</th>
                        <th>จำนวน</th>
                        <th>ราคา</th>
                        <th>สถานที่</th>
                        <th>เวลาที่ต้องการ</th>
                        <th>แก้ไข</th>
                        <th>ลบ</th>

                    </tr>

                    <tr v-for="item in items">
                        <th>{{item.name}}</th>
                        <th>{{item.item_number}}</th>
                        <th>{{item.price}}</th>
                        <th>{{item.item_place}}</th>
                        <th>{{item.item_before}}</th>
                        <th><button class="btn btn-primary" v-on:click="edit(item.item_pk,item.name,item.price,item.item_number,item.item_place,item.item_before)">แก้ไข</button></th>
                        <th><button class="btn btn-danger" v-on:click="del(item.item_pk)">ลบ</button></th>
                    </tr>
                </table>
            </div>

            <div class="col-md-4" >
                <div class="form-group" >


                    <div>
                        <label>สินค้าที่เลือก</label><br>
                        <input v-model="name" type=”text” list=”idOfDatalist” />
                        <datalist id=”idOfDatalist”>
                            <option v-for="acc in accs">{{acc.acc_name}}</option>
                        </datalist>
                    </div>


                    <div>
                        <label>จำนวน</label><br>
                        <input type="number" min="1" v-model="item_number">
                    </div>

                    <div>
                        <label>ราคา</label><br>
                        <input type="number" min="0" v-model="price">
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
                    <button type="button" class="btn btn-light" id="insert" v-on:click="insert()">เพิ่มสินค้า</button>
                    <button type="button" class="btn btn-primary" id="edit" v-on:click="update()">แก้ไข</button>

                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4">
                <button type="button" class="btn btn-light" id="billdone" v-on:click="billdone()">บิลเสร็จสิ้น</button>
            </div>
        </div>
    </div>

</div>

<script>

    $('#insert').show();
    $('#edit').hide();

    var data = new Vue({
        el : "#item" ,
        data : {
            items : [] ,
            accs : [] ,
            item_pk : "",
            name : "" ,
            price : "" ,
            item_number : "" ,
            item_place : "" ,
            item_before : "" ,
            department_pk : ""

        } ,
        mounted : function () {
            var self=this;
            $.getJSON("<?php echo site_url('QueryJSON/jsonEncodeItems')?>",function (data) {
                self.items = data ;
            })
            $.getJSON("<?php echo site_url('QueryJSON/jsonEncodeAccs')?>",function (data) {
                self.accs = data ;
            })
        } ,
        methods : {
            insert : function () {

                if(this.name == "")
                {
                    alert('กรุณาใส่ชื่อสินค้า');
                }
                else if(this.item_number < 1 )
                {
                    alert('จำนวนสินค้าไม่ถูกต้อง');
                }
                else if(item.price <0){
                    alert('ราคาสินค้าไม่ถูกต้อง');
                }
                else
                {
                    $.post("<?php echo site_url('InsertData/getitems')?>",{name:this.name,price:this.price,item_number:this.item_number,item_place:this.item_place,item_before:this.item_before});
                    location.reload();
                }
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
                if(this.name == "")
                {
                    alert('กรุณาใส่ชื่อสินค้า');
                }
                else if(this.item_number < 1 )
                {
                    alert('จำนวนสินค้าไม่ถูกต้อง');
                }
                else if(item.price <0){
                    alert('ราคาสินค้าไม่ถูกต้อง');
                }
                else {
                    $.post("<?php echo site_url('UpdateData/updateitems')?>", {
                        item_pk: this.item_pk,
                        name: this.name,
                        price: this.price,
                        item_number: this.item_number,
                        item_place: this.item_place,
                        item_before: this.item_before
                    });
                    location.reload();
                }
            } ,

            del : function (item_pk) {

                $.post("<?php echo site_url('DeleteData/deleteitems')?>",{item_pk:item_pk});
                location.reload();
            } ,

            billdone : function () {

                $.post("<?php echo site_url('InsertData/getbills')?>");
                location.reload();
            } ,


        }

    })

</script>

