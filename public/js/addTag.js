$(function () {
    const ingredient_hold = $("#ingredients");
    let ingreId = 1;
    const ingredient_add = function () {
        var ingredient = $("#ingredient");
        var values = $("#howmuch");
        if (ingredient.val() == "") {
            ingredient.addClass("is-invalid");
            return;
        } else {
            ingredient.removeClass("is-invalid");
        }
        if (values.val() == "") {
            values.addClass("is-invalid");
            return;
        } else {
            values.removeClass("is-invalid");
        }
        var ingreInput = $(
            `<input type='text' id='ingre${ingreId}' name='ingredients[]' value='${ingredient.val()}'' />`
        );
        var valueInput = $(
            `<input type='text' id='value${ingreId}' name='values[]' value='${values.val()}' />`
        );
        var ingreSpan = $(
            `<div class='ingreSpan' data-id='${ingreId}'><span class='onshow'>${ingredient.val()}</span> <span class='ontop'>${values.val()}</span> </div>`
        );
        ingreInput.appendTo(ingredient_hold);
        valueInput.appendTo(ingredient_hold);
        ingreSpan.appendTo(ingredient_hold);
        console.log(ingreId);
        ingredient.val("");
        values.val("");
        ingreId += 1;
        $(".ingreSpan").on("click", function () {
            var removeId = $(this).attr("data-id");
            $(`#ingre${removeId}`).remove();
            $(`#value${removeId}`).remove();
            $(this).remove();
        });
    };
    $("#addIngre").on("click", function () {
        ingredient_add();
    });

    const tags = $("#tags");
    let tagId = 1;
    const tag_add = function () {
        var tag = $("#tag");
        if (tag.val() == "") {
            tag.addClass("is-invalid");
            return;
        } else {
            tag.removeClass("is-invalid");
        }
        var tagInput = $(
            `<input type="text" id="tag${tagId}" name="tag[]" value="${tag.val()}" />`
        );
        var tagContent = $(
            `<div class="tagContent" data-id="${tagId}">#${tag.val()}</div>`
        );
        tagInput.appendTo(tags);
        tagContent.appendTo(tags);
        tagId += 1;
        tag.val("");

        $(".tagContent").on("click", function () {
            var removeId = $(this).attr("data-id");
            $(`#tag${removeId}`).remove();
            $(this).remove();
        });
    };
    $("#addTag").on("click", function () {
        tag_add();
    });
});
