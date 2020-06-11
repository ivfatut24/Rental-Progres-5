<div class="text-block">
    <h5 class="mb-3">Jaminan</h5>
    <div class="row">
        <div class="col-lg-12">
            <div class="form-group">
                <select name="jaminan" class="form-control">
                    <option value="KTP">KTP</option>
                    <option value="SIM">SIM</option>
                    <option value="Kartu Pelajar">Kartu Pelajar</option>
                </select>
            </div>
        </div>
        <style>
            @media (min-width: 744px){
                ._1xw8gzmn {
                    width: 100% !important;
                    float: left !important;
                }
            }
            ._1xw8gzmn {
                min-height: 1px !important;
                position: relative !important;
            }
            ._87by3p {
                position: relative !important;
                cursor: pointer !important;
                height: 160px !important;
            }
            ._1flbrra {
                position: absolute !important;
                width: 100% !important;
                height: 100% !important;
                font-size: 1px !important;
                text-align: center !important;
                outline: none !important;
            }
            ._1mad6fq {
                position: absolute !important;
                width: 100% !important;
                height: 100% !important;
                cursor: pointer !important;
                background-color: rgb(255, 255, 255) !important;
                background-size: contain !important;
                text-align: center !important;
                border-color: rgba(118, 118, 118, 0.5) !important;
                border-style: dashed !important;
                border-width: 2px !important;
                border-radius: 6px !important;
                background-repeat: no-repeat !important;
                background-position: center center !important;
            }
            ._djxl322 {
                display: table !important;
                position: relative !important;
                height: 100% !important;
                width: 100% !important;
            }
            ._ni9axhe {
                display: table-cell !important;
                vertical-align: middle !important;
            }
            ._krjbj {
                clip: rect(0px, 0px, 0px, 0px) !important;
                clip-path: inset(100%) !important;
                height: 1px !important;
                position: absolute !important;
                white-space: nowrap !important;
                width: 1px !important;
                border-width: 0px !important;
                border-style: initial !important;
                border-color: initial !important;
                border-image: initial !important;
                overflow: hidden !important;
                padding: 0px !important;
            }
            ._121z06r2 {
                overflow-wrap: break-word !important;
                font-family: Circular, -apple-system, BlinkMacSystemFont, Roboto, "Helvetica Neue", sans-serif !important;
                font-size: 14px !important;
                font-weight: 600 !important;
                line-height: 1.28571em !important;
                color: rgb(72, 72, 72) !important;
                margin: 0px !important;
            }
        </style>
        <div class="col-lg-12">
            <div class="_1xw8gzmn">
                <div class="_87by3p">
                    <input type="file" accept="image/jpeg,image/png" id="id-image-upload" class="_1flbrra">
                    <label for="id-image-upload" tabindex="-1" class="_1mad6fq" style="background-image: none;">
                        <div class="_djxl322">
                            <div class="_ni9axhe">
                                <div>
                                    <div class="_121z06r2"><span>Add photo page<div class="_1jlnvra2">JPEG or PNG
                                            </div></span></div>
                                </div>
                            </div>
                        </div>
                    </label>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-7">
            <div class="form-group">
                <label class="input-label" for="noidentitasLabel">No. Identitas</label>
                <input type="text" class="form-control" name="no_identitas" id="noidentitasLabel" placeholder="No. Identitas" required="">
            </div>
        </div>
        <div class="col-lg-5">
            <div class="form-group">
                <label class="input-label" for="signUpTelepon">No. Telepon</label>
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="bg-white border-right-0 input-group-text">+62</span>
                    </div>
                    <input type="number" class="form-control" name="no_telp" id="signUpTelepon" placeholder="xxx" aria-label="xxx" required="" value="<?= @$no_telp ?>">
                </div>
            </div>
        </div>
    </div>
</div>