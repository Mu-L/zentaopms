$(function()
{
    $('.side-col .cell').height($('.side-col').height() - 20);
    $('#source .cell').height($('#source').height() - 20);
    $('#programBox .cell').height($('#programBox').height() - 20);

    pgmBegin = $('.pgmParams #begin').val();
    pgmEnd   = $('.pgmParams #end').val();
    setPgmBegin(pgmBegin);
    setPgmEnd(pgmEnd);

    $('[name^=lines]').change(function()
    {
        value = $(this).val();
        if($(this).prop('checked'))
        {
            $('[data-line=' + value + ']').prop('checked', true)
        }
        else
        {
            $('[data-line=' + value + ']').prop('checked', false)
        }
        setPgmBegin(pgmBegin);
        setPgmEnd(pgmEnd);
    })

    $('#longTime').change(function()
    {   
        if($(this).prop('checked'))
        {   
            $('#end').val('').attr('disabled', 'disabled');
            $('#days').val('');
        }   
        else
        {   
            $('#end').removeAttr('disabled');
        }   
    }); 

    $('#lineList li a').click(function()
    {
        /* Active current li and remove active before li. */
        $(this).closest('ul').find('li').removeClass('active');
        $(this).closest('li').addClass('active');

        /* Show current data and hide before data. */
        var target = $(this).attr('data-target');        
        $('.lineBox').addClass('hidden');
        $(target).removeClass('hidden');
        $('#source').find('.lineBox :checkBox').prop('checked', false);
        $(target).find(":checkbox").prop('checked', true);

        /* Replace program name. */
        $('#PGMName').val($(this).text());

        /* Replace project name. */
        var productID = $(target).find('.lineGroup .productList input[name*="product"]').val();
        var link = createLink('upgrade', 'ajaxGetProductName', 'productID=' + productID);
        $.post(link, function(data)
        {
            $('#PRJName').val(data);
        })

        setPgmBegin(pgmBegin);
        setPgmEnd(pgmEnd);
    })

    $('[name^=products]').change(function()
    {
        value = $(this).val();
        if($(this).prop('checked'))
        {
            $('[data-product=' + value + ']').prop('checked', true)

            var lineID = $(this).attr('data-line');
            if(lineID && $('[data-lineid=' + lineID + ']').length > 0 && !$('[data-lineid=' + lineID + ']').prop('checked')) $('[data-lineid=' + lineID + ']').prop('checked', true);
        }
        else
        {
            $('[data-product=' + value + ']').prop('checked', false)
        }
        setPgmBegin(pgmBegin);
        setPgmEnd(pgmEnd);
    })

    $('[name^=sprints]').change(function()
    {
        if($(this).prop('checked'))
        {
            var lineID = $(this).attr('data-line');
            if(lineID && $('[data-lineid=' + lineID + ']').length > 0 && !$('[data-lineid=' + lineID + ']').prop('checked')) $('[data-lineid=' + lineID + ']').prop('checked', true);

            var productID = $(this).attr('data-product');
            if(productID && $('[data-productid=' + productID + ']').length > 0 && !$('[data-productid=' + productID + ']').prop('checked')) $('[data-productid=' + productID + ']').prop('checked', true);
        }
        setPgmBegin(pgmBegin);
        setPgmEnd(pgmEnd);
    })

    toggleProgram($('form #newProgram0'));
    toggleProject($('form #newProject0'));
});

function toggleProgram(obj)
{
    var $obj       = $(obj);
    if($obj.length == 0) return false;

    var $programs  = $obj.closest('table').find('#programs');
    var $pgmParams = $obj.closest('table').find('.pgmParams');
    if($obj.prop('checked'))
    {
        $('form #newProject0').prop('checked', true);
        toggleProject($('form #newProject0'));

        $('#PGMName').closest('tr').show();
        $programs.attr('disabled', 'disabled');
        $pgmParams.removeClass('hidden');
    }
    else
    {
        $('#PGMName').closest('tr').hide();
        $programs.removeAttr('disabled');
        $pgmParams.addClass('hidden');

        toggleProject($('form #newProject0'));
    }
}

function toggleProject(obj)
{
    var $obj       = $(obj);
    if($obj.length == 0) return false;

    var $projects  = $obj.closest('table').find('#projects');
    var $pgmParams = $obj.closest('table').find('.pgmParams');
    if($obj.prop('checked'))
    {
        $projects.attr('disabled', 'disabled');
        $pgmParams.removeClass('hidden');
        if(!$('form #newProgram0').prop('checked')) $('#PGMName').closest('tr').hide();
    }
    else
    {
        $projects.removeAttr('disabled');
        $pgmParams.addClass('hidden');

        $('form #newProgram0').prop('checked', false);
        $('#programs').removeAttr('disabled');
    }
}

function setPgmBegin(pgmBegin)
{
    $(':checkbox:checked[data-begin]').each(function()
    {
        begin = $(this).attr('data-begin').substr(0, 10);
        if(begin == '0000-00-00') return true;

        if(begin < pgmBegin)
        {
            pgmBegin = begin;
            $('.pgmParams #begin').val(pgmBegin);
        }
    });
}

function setPgmEnd(pgmEnd)
{
    $(':checkbox:checked[data-end]').each(function()
    {
        end = $(this).attr('data-end').substr(0, 10);
        if(end == '0000-00-00') return true;

        if(end > pgmEnd)
        {
            pgmEnd = end;
            $('.pgmParams #end').val(pgmEnd);
        }
    });
}

function convertStringToDate(dateString)
{
    dateString = dateString.split('-');
    return new Date(dateString[0], dateString[1] - 1, dateString[2]);
}

/**
 * Compute delta of two days.
 *
 * @param  string $date1
 * @param  string $date1
 * @access public
 * @return int
 */
function computeDaysDelta(date1, date2)
{
    date1 = convertStringToDate(date1);
    date2 = convertStringToDate(date2);
    delta = (date2 - date1) / (1000 * 60 * 60 * 24) + 1;

    weekEnds = 0;
    for(i = 0; i < delta; i++)
    {
        if((weekend == 2 && date1.getDay() == 6) || date1.getDay() == 0) weekEnds ++;
        date1 = date1.valueOf();
        date1 += 1000 * 60 * 60 * 24;
        date1 = new Date(date1);
    }
    return delta - weekEnds;
}

/**
 * Compute work days.
 *
 * @access public
 * @return void
 */
function computeWorkDays(currentID)
{
    isBactchEdit = false;
    if(currentID)
    {
        index = currentID.replace('begins[', '');
        index = index.replace('ends[', '');
        index = index.replace(']', '');
        if(!isNaN(index)) isBactchEdit = true;
    }

    if(isBactchEdit)
    {
        beginDate = $('#begins\\[' + index + '\\]').val();
        endDate   = $('#ends\\[' + index + '\\]').val();
    }
    else
    {
        beginDate = $('#begin').val();
        endDate   = $('#end').val();
    }

    if(beginDate && endDate)
    {
        if(isBactchEdit)  $('#dayses\\[' + index + '\\]').val(computeDaysDelta(beginDate, endDate));
        if(!isBactchEdit) $('#days').val(computeDaysDelta(beginDate, endDate));
    }
    else if($('input[checked="true"]').val())
    {
        computeEndDate();
    }
}

/**
 * Compute the end date for project.
 *
 * @param  int    $delta
 * @access public
 * @return void
 */
function computeEndDate(delta)
{
    beginDate = $('#begin').val();
    if(!beginDate) return;

    delta     = parseInt(delta);
    beginDate = convertStringToDate(beginDate);
    if((delta == 7 || delta == 14) && (beginDate.getDay() == 1))
    {
        delta = (weekend == 2) ? (delta - 2) : (delta - 1);
    }

    endDate = beginDate.addDays(delta - 1).toString('yyyy-MM-dd');
    $('#end').val(endDate).datetimepicker('update');
    computeWorkDays();
}
