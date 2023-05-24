<div class="modal modal-fade" id="approve_invoice">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content modal-content-demo">
            <div class="modal-header">
                <h6 class="modal-title">{{ trans('category.add') }}</h6><button aria-label="Close" class="close"
                    data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
            </div>
            <form action="{{ route('approve_close_invoice') }}" method="POST" id="approve">
                @method ('POST')
                @csrf
                <div class="modal-body">
                    <div class="row my-2">
                        <div class="col-lg-6">
                            <div class="input-group">
                                <span class='input-group-text'> {{ trans('invoice.totalinvocie_before_discount') }}</span>
                                <input  class="form-control" id="total_inv" name='total_inv' readonly value="0">
                                <span class='input-group-text'> {{ env('MAIN_CURRENCY') }}</span>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="input-group">
                                <span class='input-group-text'>{{ trans('invoice.totalinvocie_product') }}</span>
                                <input id="product_count" class="form-control" readonly value="">
                            </div>
                        </div>
                    </div>
                    <div class="row my-2">
                        <div class="col-lg-6">
                            <div class="input-group">
                                <span class="input-group-text">{{ trans('invoice.discount') }}</span>
                                <select class="form-control" name="discount_type" id="discount_type">
                                    <option value="0">{{ trans('invoice.discount_none') }}</option>
                                    <option value="1">{{ trans('invoice.discount_value') }}</option>
                                    <option value="2">{{ trans('invoice.discount_rate') }}</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-6"></div>
                    </div>
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="input-group">
                                <div class="input-group">
                                    <span class='input-group-text'>{{ trans('invoice.tax') }}</span>
                                    <input class="form-control" id="tax_rate" name='tax_rate'>
                                    <input class="form-control" id="tax_value" name='tax_value' readonly>
                                    <span class='input-group-text'> {{ env('MAIN_CURRENCY') }}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row my-2">
                        <div class="col-lg-6">
                            <div class="input-group">
                                <label class='input-group-text'>{{ trans('invoice.totalinvocie') }}</label>
                                <input class="form-control" id="total_inv" name='total_inv' readonly value="0">
                                <span class='input-group-text'> {{ env('MAIN_CURRENCY') }}</span>
                            </div>
                        </div>
                    </div>
                    <input type="hidden" name='id' value="{{ $data['sales_invoice'] }}">
                </div>
                
                </form>


            <div class="modal-footer">
                <button class="btn btn-success btn-block btn-sm tx-15 tx-bold py-2" onclick="document.getElementById('approve').submit()" >{{ trans('general.save') }}<i
                        class="mx-2 fa fa-save"></i></button>
            </div>
        </div>
    </div>
</div>
