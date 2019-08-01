@section('box')
    <div class="modal fade" id="invoice">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Add New Product</h4>
                </div>
                <div class="invoice-box">
                    <div class="flex-invoicesubheader">
                        <table>
                            <tr class="invoiceheading">
                                <td colspan=2>
                                    <div class="invoice-headr">
                                        <div class="headerdiv">
                                            <h2 class="companyheading"> QUICKSTOP </h2>
                                            <small>Houston Texas</small>
                                        </div>
                                        <div class="headerinvoicediv">
                                            <h2 class="companyheading"> INV #OTO-9171</h2>
                                            <h3 class="header-subheading">16 May, 2019</h3>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td style="padding-top: 15px; vertical-align: top;">
                                    <div class="headerdiv-customer">
                                        <div class="sub-customerinfo"><b>Bill To</b></div>
                                        <div class="customername">Anis Noor Ali</div>
                                        <div class="sub-customerinfo">12691 BISSONET ST.</div>
                                        <div class="sub-customerinfo">Houston TX</div>
                                        <div class="sub-customerinfo">77099</div>
                                    </div>
                                </td>
                                <td style="padding-top: 15px; vertical-align: top;">
                                    <div class="ng-star-inserted">
                                        <div class="date ng-star-inserted" style="text-align: right;"><b>Invoice By</b>
                                        </div>
                                        <div class="date" style="text-align: right;">ANIS</div>
                                    </div>
                                    <div>
                                        <div class="date" style="text-align: right;"><b>Total Amount</b></div>
                                        <div class="date" style="text-align: right;">$44.00</div>
                                    </div>
                                </td>
                            </tr>
                        </table>
                    </div>
                    <div>
                        <table cellpadding="0" cellspacing="0">
                            <tr>
                                <td>

                                </td>
                                <td>

                                </td>
                                <td>

                                </td>
                                <td>

                                </td>
                                <td class="right">

                                </td>
                                <td colspan="2" class="src-heading" style="text-align:center; ">
                                    RETAIL INFORMATION
                                </td>

                            </tr>
                            <tr class="heading">
                                <td>
                                    QTY
                                </td>
                                <td>
                                    BARCODE
                                </td>
                                <td>
                                    DESCRIPTION
                                </td>
                                <td class="right">
                                    PRICE
                                </td>
                                <td class="right">
                                    AMOUNT
                                </td>
                                <td class="right src-left">
                                    SRP
                                </td>
                                <td class="right src-right">
                                    RETAIL
                                </td>
                            </tr>

                            <tr class="item">
                                <td>
                                    15 May, 2019
                                </td>
                                <td>
                                    Invoice
                                </td>
                                <td>
                                    QUICK SHOP #1301
                                </td>
                                <td class="right">
                                    $232.86
                                </td>
                                <td class="right">
                                    $232.86
                                </td>
                                <td class="right src-left">
                                    $232.86
                                </td>
                                <td class="right src-right">
                                    $232.86
                                </td>
                            </tr>
                            <tr class="item">
                                <td>
                                    15 May, 2019
                                </td>

                                <td>
                                    Invoice
                                </td>
                                <td>
                                    QUICK SHOP #1301
                                </td>
                                <td class="right">
                                    $232.86
                                </td>
                                <td class="right">
                                    $232.86
                                </td>
                                <td class="right src-left">
                                    $232.86
                                </td>
                                <td class="right src-right">
                                    $232.86
                                </td>
                            </tr>
                            <tr class="item total">
                                <td colspan="4">Total</td>

                                <td class="right">
                                    $763.43
                                </td>
                                <td class="right src-left">

                                </td>
                                <td class="right src-right">
                                    $232.86
                                </td>

                            </tr>
                        </table>
                    </div>
                    <div class="invoice-summary">
                        <table style="width:30%">
                            <thead>

                            </thead>
                            <tbody>
                            <tr>
                                <td style="font-size:13px; font-weight: 600;"> Total</td>
                                <td class="right"> $44.00</td>
                            </tr>
                            <tr>
                                <td style="font-size:13px; font-weight: 600; "> Sales Tax (0%)</td>
                                <td class="right"> $0.00</td>
                            </tr>
                            <tr>
                                <td style="font-size:13px; font-weight: 600;"> Net Total</td>
                                <td class="right"> $44.00</td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="flex-invoicesubheader">
                        <table>
                            <tbody>
                            <tr>
                                <div class="opening-balance-text" style="text-align:center;"> CURRENT OPEN BALANCE TOTAL:
                                    $284.63
                                </div>
                            </tr>

                            <tr>
                                <p class="disclaimer-text"> ALL RETURN CHECKS ARE SUBJECT TO A $50.00 RETURN FEE. BY
                                    ACCEPTING THIS INVOICE CUSTOMER AGREE TO PAY BAGS FOR THIS INVOICE IN FULL ACCORDING TO
                                    THEIR TERMS. A SERVICE CHARGE OF 18% APR PER MONTH WILL BE ADDED TO ALL PAST DUE
                                    INVOICES CUSTOMER WILL BE RESPONSIBLE FOR ALL LEGAL AND COLLECTION FEES. CUSTOMER IS
                                    RESPONSIBLE FOR ALL APPLICABLE SALES TAX. ALL RETURNS OR EXCHANGES MUST BE MADE WITHIN
                                    30 DAYS WITH A RECEIPT. </p>

                                <img src="http://barcode.pinonclick.com/barcode?code=413075"/>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->
@endsection
