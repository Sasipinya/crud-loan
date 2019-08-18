<div class="form-group {{ $errors->has('loanAmount') ? 'has-error' : ''}}">
    <label for="loanAmount" class="control-label">{{ 'Loan Amount' }}</label>
    <div class="input-group mb-3">
        <input name="loanAmount" type="text" id="loanAmount" class="form-control"
               value="{{ isset($post->loanAmount) ? intval($post->loanAmount): ''}}" aria-label="Loan Amount"
               aria-describedby="basic-addon2" required>
        <div class="input-group-append">
            <span class="input-group-text" id="basic-addon2">฿</span>
        </div>
    </div>
    {!! $errors->first('loanAmount', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('loanTerm') ? 'has-error' : ''}}">
    <label for="loanTerm" class="control-label">{{ 'Loan Term' }}</label>
    <div class="input-group mb-3">
        <input name="loanTerm" type="text" id="loanTerm" class="form-control"
               value="{{ isset($post->loanTerm) ? $post->loanTerm : ''}}" aria-label="Loan Term"
               aria-describedby="basic-addon3" required>
        <div class="input-group-append">
            <span class="input-group-text" id="basic-addon3">Years</span>
        </div>
    </div>
    {!! $errors->first('loanTerm', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('interestRate') ? 'has-error' : ''}}">
    <label for="interestRate" class="control-label">{{ 'Interest Rate' }}</label>
    <div class="input-group mb-3">
        <input class="form-control" name="interestRate" type="text" id="interestRate"
               value="{{ isset($post->interestRate) ? number_format(($post->interestRate), 2) : ''}}"
               aria-label="Interest Rate" aria-describedby="basic-addon4" required>
        <div class="input-group-append">
            <span class="input-group-text" id="basic-addon4">%</span>
        </div>
    </div>
    {!! $errors->first('interestRate', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('startdate') ? 'has-error' : ''}}">

    <label for="startdate" class="control-label">{{ 'Startdate' }}</label>

    <select name="startdate_month" class="custom-select mr-sm-2" id="startdate_month">
        @foreach (json_decode('{"January":"January","Febuary":"Febuary","March":"March","April":"April","May":"May","June":"June","July":"July","August":"August"
            ,"September":"September","October":"October","November":"November","December":"December"}', true) as $optionKey => $optionValue)
            <option
                value="{{ $optionKey }}" {{ (isset($post->startdate_month) && $post->startdate_month == $optionKey) ? 'selected' : ''}}>
                {{ $optionValue }}
            </option>
        @endforeach
    </select>
    <select name="startdate_year" class="custom-select mr-sm-2" id="startdate_year">
        @foreach (json_decode('{"2017":"2017"
        ,"2018":"2018"
        ,"2019":"2019"
        ,"2020":"2020"
        ,"2021":"2021"
        ,"2022":"2022"
        ,"2023":"2023"
        ,"2024":"2024"
        ,"2025":"2025"
        ,"2026":"2026"
        ,"2027":"2027"
        ,"2028":"2028"
        ,"2029":"2029"
        ,"2030":"2030"
        ,"2031":"2031"
        ,"2032":"2032"
        ,"2033":"2033"
        ,"2034":"2034"
        ,"2035":"2035"
        ,"2036":"2036"
        ,"2037":"2037"
        ,"2038":"2038"
        ,"2039":"2039"
        ,"2040":"2040"
        ,"2041":"2041"
        ,"2042":"2042"
        ,"2043":"2043"
        ,"2044":"2044"
        ,"2045":"2045"
        ,"2046":"2046"
        ,"2047":"2047"
        ,"2048":"2048"
        ,"2049":"2049"
        ,"2050":"2050"}', true) as $optionKeyyear => $optionValueyear)
            <option
                value="{{ $optionKeyyear }}" {{ (isset($post->startdate_year) && $post->startdate_year == $optionKeyyear) ? 'selected' : ''}}>
                {{ $optionValueyear }}
            </option>
        @endforeach
    </select>
</div>


<div class="form-group">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Update' : 'Create' }}">
</div>
