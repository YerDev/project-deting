@extends('layouts.master')
@section('title', 'Kategori Produk')
@section('content')
<div class="col-12 mt-5" id="app">
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-md-7">
                    <div v-for="res in kat">
                        <b-card-group deck>
                            <div v-for="ins in res.data">
                                <b-link :href="`/kategori-detail?kategori=${ins.kategori}`">
                                    <b-card bg-variant="secondary" text-variant="white" :footer="ins.kategori"
                                            class="text-center">
                                        <b-card-text style="height: 100px; width: 150px;">
                                            <b-img v-if="ins.kategori === 'Daging'" thumbnail fluid
                                                   src="./storage/Image/kategori/daging.jpg"
                                                   style="max-width: 100%!important; max-height: 100%!important;"></b-img>
                                            <b-img v-if="ins.kategori === 'Sayur'" thumbnail fluid
                                                   src="./storage/Image/kategori/sayur.jpg"
                                                   style="max-width: 100%!important; max-height: 100%!important;"></b-img>
                                            <b-img v-if="ins.kategori === 'Buah'" thumbnail fluid
                                                   src="./storage/Image/kategori/buah.jpg"
                                                   style="max-width: 100%!important; max-height: 100%!important;"></b-img>
                                            <b-img v-if="ins.kategori === 'Ikan'" thumbnail fluid
                                                   src="./storage/Image/kategori/ikan.jpg"
                                                   style="max-width: 100%!important; max-height: 100%!important;"></b-img>
                                            <b-img v-if="ins.kategori === 'Sembako'" thumbnail fluid
                                                   src="./storage/Image/kategori/Sembako.jpg"
                                                   style="max-width: 100%!important; max-height: 100%!important;"></b-img>
                                            <b-img v-if="ins.kategori === 'Rempah-rempah'" thumbnail fluid
                                                   src="./storage/Image/kategori/rempah-rempah.jpg"
                                                   style="max-width: 100%!important; max-height: 100%!important;"></b-img>
                                            <b-img v-if="ins.kategori === 'Peralatan mandi'" thumbnail fluid
                                                   src="./storage/Image/kategori/peralatan-mandi.jpg"
                                                   style="max-width: 100%!important; max-height: 100%!important;"></b-img>
                                            <b-img v-if="ins.kategori === 'Aqua galon'" thumbnail fluid
                                                   src="./storage/Image/kategori/aqua.jpg"
                                                   style="max-width: 100%!important; max-height: 100%!important;"></b-img>
                                            <b-img v-if="ins.kategori === 'Kosmetik'" thumbnail fluid
                                                   src="./storage/Image/kategori/kosmetik.jpg"
                                                   style="max-width: 100%!important; max-height: 100%!important;"></b-img>
                                            <b-img v-if="ins.kategori === 'Tabung gas'" thumbnail fluid
                                                   src="./storage/Image/kategori/gas.jpg"
                                                   style="max-width: 100%!important; max-height: 100%!important;"></b-img>
                                        </b-card-text>
                                    </b-card>
                                </b-link>
                            </div>
                        </b-card-group>
                    </div>

                </div>
                <div class="col-md-5">
                    <h4>Cari Berdasarkan</h4><br><br><br>
                    <div class="form-group">
                        <label for="nama_produk">Nama Produk</label>
                        <input type="text" class="form-control" v-model="produk" id="nama_produk"
                               aria-describedby="nama_produk">
                        <small id="emailHelp" class="form-text text-muted">Ketik Manual Produk Yang Ingin dicari</small>
                    </div>
                    <p>
                        <bold>Lokasi
                            <bold>
                    </p>
                    <fieldset>
                        <div class="form-group">
                            <label for="Provinsi">Provinsi</label>
                            <select class="form-control" v-model="provinsi" @change="getKab">
                                <option v-for="data in prov" :value="data.kode">@{{ data.nama
                                    }}
                                </option>
                            </select>
                        </div>
                        <div class="form-group" v-show="look.kab === true">
                            <label for="Kabupaten">Kabupaten</label>
                            <select class="form-control" v-model="kabupaten" @change="getKec">
                                <option v-for="data in kab" :value="data.kode">@{{ data.nama
                                    }}
                                </option>
                            </select>
                        </div>
                        <div class="form-group" v-show="look.kec === true">
                            <label for="Kecamatan">Kecamatan</label>
                            <select class="form-control" v-model="kecamatan" @change="getKel">
                                <option v-for="data in kec" :value="data.kode">@{{ data.nama
                                    }}
                                </option>
                            </select>
                        </div>
                        <div class="form-group" v-show="look.kel === true" v-model="kelurahan">
                            <label for="Kelurahan">Kelurahan/Desa</label>
                            <select id="Kelurahan" class="form-control" v-model="kelurahan">
                                <option v-for="data in kel" :value="data.kode">@{{ data.nama
                                    }}
                                </option>
                            </select>
                        </div>

                        <button type="submit" class="btn btn-secondary btn-lg btn-block" @click="cariPedagang">
                            Cari
                        </button>
                    </fieldset>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/vue@^2.0.0/dist/vue.min.js"></script>
<script src="https://unpkg.com/bootstrap-vue@latest/dist/bootstrap-vue.js"></script>
<script src="https://unpkg.com/axios/dist/axios.min.js"></script>
<script>
    new Vue({
        el: '#app',
        data: function () {
            return {
                kat: [],
                look: {
                    kab: false,
                    kec: false,
                    kel: false
                },
                produk: '',
                prov: [],
                provinsi: null,
                kab: [],
                kabupaten: null,
                kec: [],
                kecamatan: null,
                kel: [],
                kelurahan: null,
            }
        },
        methods: {
            cariPedagang() {
                if (this.kelurahan !== null) {
                    window.location.href = `/hasil-pedagang?search=${this.kelurahan}&produk=${this.produk}`
                } else if (this.kecamatan !== null) {
                    window.location.href = `/hasil-pedagang?search=${this.kecamatan}&produk=${this.produk}`
                } else if (this.kabupaten !== null) {
                    window.location.href = `/hasil-pedagang?search=${this.kabupaten}&produk=${this.produk}`
                } else if (this.provinsi !== null) {
                    window.location.href = `/hasil-pedagang?search=${this.provinsi}&produk=${this.produk}`
                } else {
                    alert("Pilih Wilayah")
                }
            },
            getProvinsi() {
                axios.get('/api/getprovinsi')
                    .then((res) => {
                        this.prov = res.data
                    })
            },
            getKab() {
                axios.get(`/api/getkab/${this.provinsi}`)
                    .then((res) => {
                        this.kab = res.data
                        this.look.kab = true
                        this.look.kec = false
                        this.kecamatan = null
                        this.look.kel = false
                        this.kelurahan = null
                    })
            },
            getKec() {
                axios.get(`/api/getkec/${this.kabupaten}`)
                    .then((res) => {
                        this.kec = res.data
                        this.look.kec = true
                        this.look.kel = false
                        this.kelurahan = null
                    })
            },
            getKel() {
                axios.get(`/api/getkel/${this.kecamatan}`)
                    .then((res) => {
                        this.kel = res.data
                        this.look.kel = true
                    })
            },
            getKategoriProduk() {
                axios.get('/api/getkategoriproduk')
                    .then((res) => {
                        this.kat = res.data
                    })
                    .catch(() => {
                        alert("Terjadi kesalahan, Refreh(F5)")
                    })
            }
        },
        created() {
            this.getKategoriProduk()
            this.getProvinsi()
        }
    })
</script>
@endsection

