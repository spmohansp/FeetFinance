@extends('client.layout.master')

@section('header')
    Add Document
@endsection

@section('vehicle')
    is-active
@endsection


@section('content')

    <form action="{{ route('client.savedocument', $vehicleId) }}" method="POST">
        {{ csrf_field() }}
        <div class="row">
            <div class="col-xl-12">
                <div class="c-field u-mb-medium">
                    <label class="c-field__label" for="customer-name">Document Type</label>
                    <select class="c-input" name="type" id="document-type">
                        <option value="qtax">Q Tax</option>
                        <option value="nptax">NP Tax</option>
                        <option value="permit">Permit Renewal</option>
                        <option value="finance">Finance Due</option>
                        <option value="pollutioncontrol">Pollution Control</option>
                        <option value="others">Others</option>
                    </select>
                </div>
                <div class="c-field u-mb-medium">
                    <label class="c-field__label" for="document-duedate">Due Date</label>
                    <input class="c-input" type="date" name="duedate" id="document-duedate">
                </div>
                <div class="c-field u-mb-medium">
                    <label class="c-field__label" for="document-notify">Notify Before(Days)</label>
                    <input class="c-input" type="number" name="notifyBefore" id="document-notify">
                </div>
                <div class="c-field u-mb-medium">
                    <label class="c-field__label" for="document-interval">Interval(Months)</label>
                    <input class="c-input" type="number" name="interval" id="document-interval">
                </div>
                <div class="c-field u-mb-medium">
                    <label class="c-field__label" for="document-issuingCompany">Issuing Company</label>
                    <input class="c-input" type="text" name="issuingCompany" id="document-issuingCompany">
                </div>
                <div class="c-field u-mb-medium">
                    <label class="c-field__label" for="document-amount">Amount</label>
                    <input class="c-input" type="number" name="amount" id="document-amount">
                </div>
                <div class="c-field u-mb-medium">
                    <label class="c-field__label" for="document-notes">Notes</label>
                    <input class="c-input" type="text" name="notes" id="document-notes">
                </div>
            </div>
        </div>
        <div class="col-12 col-sm-7 col-xl-12 u-mr-auto u-mb-xsmall">
            <button class="c-btn c-btn--info c-btn--fullwidth">Save</button>
        </div>
    </form>

@endsection
