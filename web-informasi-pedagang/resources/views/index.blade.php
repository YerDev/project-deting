
<html>
<head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <style>
        .form-row {
            border:  1px solid #e2e2e2;
            margin:  10px;
            padding: 20px;
            background: #f2f2f2;
        }
        .subrow {
            margin: 5px;
            padding:  5px;
        }
    </style>
</head>
<body>
<div id="app" class="container">
    <div class="col-xs-12">
        <div class="row  form-row" v-for="row in rows">
            <div class="col-xs-12">
                <div class="row">
                    <div class="col-xs-12">
                        <div class="col-xs-3">
                            <select name="" id="" class="form-control" v-model="row.select">
                                <option :value="option.value" v-for="option in options">@{{ option.label }}</option>
                            </select>
                        </div>
                        <div class="col-xs-6">
                            <input type="text" class="form-control" placeholder="Value" v-model="row.name">
                        </div>
                        <div class="col-xs-2">
                            <input type="checkbox" v-model="row.check">&nbsp;&nbsp;Mandatory
                        </div>
                        <div class="col-xs-1">
                            <button class="btn btn-danger" @click="deleteRow(row)">X</button>
                        </div>
                    </div>
                </div>
                <div class="row" v-if="row.select==3 || row.select==4 ">
                    <div class="row subrow" v-for="subrow in row.subrows">
                        <div class="col-xs-12">
                            <div class="col-xs-3"></div>
                            <div class="col-xs-7">
                                <input type="text" class="form-control" v-model="subrow.answer">
                            </div>
                            <div class="col-xs-2">
                                <button class="btn btn-danger" @click="deleteSubrow(row,subrow)">X</button>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-12">
                            <button class="btn btn-success center-block" @click="addSubRow(row)">Add Answer</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12">
                <button type="submit" @click="submit" class="btn btn-info">Submit</button>
                <button type="submit" class="btn btn-success" @click="addRow">Add Row</button>
            </div>
        </div>
    </div>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/vue/1.0.26/vue.js"></script>
<script>
    new Vue({
        el: '#app',
        data: {
            options: [
                { 'label': 'Text', 'value': 1},
                { 'label': 'Numeric', 'value': 2},
                { 'label': 'Check box', 'value': 3},
                { 'label': 'Radio button', 'value': 4},
                { 'label': 'Drop down', 'value': 5},
                { 'label': 'Image', 'value': 6},
                { 'label': 'Date', 'value': 7},
            ],
            rows: [
                { 'select': 1, 'name': '', 'check': false, 'subrows': [{  answer: ''}]}
            ]
        },
        methods: {
            addRow: function() {
                this.rows.push({'select': 1, 'name': '', 'check': false, subrows: [{ answer: ''} ]});
            },
            deleteRow: function(row) {
                this.rows.$remove(row);
            },
            addSubRow: function(row) {
                row.subrows.push({ answer: ''})
            },
            deleteSubrow: function(row, subrow) {
                alert(subrow);
                row.subrows.$remove(subrow);
            },
            submit(){
                console.log(this.rows[0].name)
                alert(this.rows[0])
            }
        }
    })
</script>
</body>
</html>

