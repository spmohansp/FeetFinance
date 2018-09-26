@extends('client.layout.master')

@section('header')
    Edit Document
@endsection

@section('vehicle')
    is-active
@endsection

@section('content')
    <form action="{{ route('client.updatedocument', $document->id) }}" method="POST">
        {{ csrf_field() }}
        <div class="row">
            <div class="col-xl-12">
                <div class="c-field u-mb-medium">
                    <label class="c-field__label" for="customer-name">Document Type</label>
                    <select class="c-input" name="type" id="document-type">
                        <option value="qtax" <?php if($document->type=='qtax'){ echo 'selected';} ?> >Q Tax</option>
                        <option value="nptax" <?php if($document->type=='nptax'){ echo 'selected';} ?> >NP Tax</option>
                        <option value="permit" <?php if($document->type=='permit'){ echo 'selected';} ?> >Permit Renewal</option>
                        <option value="finance" <?php if($document->type=='finance'){ echo 'selected';} ?> >Finance Due</option>
                        <option value="pollutioncontrol" <?php if($document->type=='pollutioncontrol'){ echo 'selected';} ?> >Pollution Control</option>
                        <option value="others" <?php if($document->type=='others'){ echo 'selected';} ?> >Others</option>
                    </select>
                </div>
                <div class="c-field u-mb-medium">
                    <label class="c-field__label" for="document-duedate">Due Date</label>
                    <input class="c-input" type="date" value="{{ $document->duedate }}" name="duedate" id="document-duedate">
                </div>
                <div class="c-field u-mb-medium">
                    <label class="c-field__label" for="document-notify">Notify Before</label>
                    <input class="c-input" type="number" value="{{ $document->notifyBefore }}" name="notifyBefore" id="document-notify">
                </div>
                <div class="c-field u-mb-medium">
                    <label class="c-field__label" for="document-interval">Interval(Months)</label>
                    <input class="c-input" type="number" value="{{ $document->interval }}" name="interval" id="document-interval">
                </div>
                <div class="c-field u-mb-medium">
                    <label class="c-field__label" for="document-issuingCompany">Issuing Company</label>
                    <input class="c-input" type="text" value="{{ $document->issuingCompany }}" name="issuingCompany" id="document-issuingCompany">
                </div>
                <div class="c-field u-mb-medium">
                    <label class="c-field__label" for="document-amount">Amount</label>
                    <input class="c-input" type="number" value="{{ $document->amount }}" name="amount" id="document-amount">
                </div>
                <div class="c-field u-mb-medium">
                    <label class="c-field__label" for="document-notes">Notes</label>
                    <input class="c-input" type="text" value="{{ $document->notes }}" name="notes" id="document-notes">
                </div>
            </div>
        </div>
        <div class="col-12 col-sm-7 col-xl-12 u-mr-auto u-mb-xsmall">
            <button class="c-btn c-btn--primary c-btn--fullwidth">Update Document</button>
        </div>
    </form>

@endsection
