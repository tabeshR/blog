<div class="collapse" id="collapseExample">
    <div class="card card-body">
        <form>
            <div class="form-group">
                <div class="row">
                    <div class="col">
                        <input type="text" class="form-control" name="key" placeholder="جستجو بر اساس عنوان و دسته بندی">
                    </div>
                </div>
            </div>
        </form>
        <hr>
        <form>
            <div class="form-group">
                <div class="row">
                    <div class="col-md-5 col-12">
                        <label for="">از</label>
                        <div class="row">
                            <div class="col">
                                <select name="fromDateDay" id="" class="form-control">
                                    @for($i=1;$i<32;$i++)
                                        <option {{ request('fromDateDay') == $i ? "selected"  :"" }} value="{{ $i }}">{{ $i }}</option>
                                    @endfor
                                </select>
                            </div>
                            <div class="col">
                                <select name="fromDateMonth" id="" class="form-control">
                                    <option value="1" {{ request('fromDateMonth') == '1' ? "selected"  :"" }}>فروردین</option>
                                    <option value="2" {{ request('fromDateMonth') == '2' ? "selected"  :"" }}>اردیبهشت</option>
                                </select>
                            </div>
                            <div class="col">
                                <select name="fromDateYear" id="" class="form-control">
                                    <option value="1400" {{ request('fromDateYear') == '1400' ? "selected"  :"" }}>1400</option>
                                    <option value="1401" {{ request('fromDateYear') == '1401' ? "selected"  :"" }}>1401</option>
                                    <option value="1402" {{ request('fromDateYear') == '1402' ? "selected"  :"" }}>1402</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-5 col-12">
                        <label for="">تا</label>
                        <div class="row">
                            <div class="col">
                                <select name="toDateDay" id="" class="form-control">
                                    @for($i=1;$i<32;$i++)
                                        <option {{ request('toDateDay') == $i ? "selected" : "" }} value="{{ $i }}">{{ $i }}</option>
                                    @endfor
                                </select>
                            </div>
                            <div class="col">
                                <select name="toDateMonth" id="" class="form-control">
                                    <option value="1" {{ request('toDateMonth') == '1' ? "selected"  :"" }}>فروردین</option>
                                    <option value="2" {{ request('toDateMonth') == '2' ? "selected"  :"" }}>اردیبهشت</option>
                                </select>
                            </div>
                            <div class="col">
                                <select name="toDateYear" id="" class="form-control">
                                    <option value="1400" {{ request('toDateYear') == '1400' ? "selected"  :"" }}>1400</option>
                                    <option value="1401" {{ request('toDateYear') == '1401' ? "selected"  :"" }}>1401</option>
                                    <option value="1402" {{ request('toDateYear') == '1402' ? "selected"  :"" }}>1402</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-2 col-12" style="text-align: right">
                        <label for="" style="visibility: hidden">جستجو</label>
                        <div class="row">
                            <div class="col">
                                <button type="submit" class="btn btn-sm btn-primary">جستجو</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
