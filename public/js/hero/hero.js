$(document).ready(function () {

    $("#race").on('change', function () {

        var url = $("#DataHeroByRace").attr('action');
        $.ajax({
            url: url + '/' + $(this).val(),
            type: 'GET'
            ,
            beforeSend: function () {
                $('#class').find('option').remove();
                $('#first_name').find('option').remove();
                $('#last_name').find('option').remove();
            },
            success: function (data) {

                var row_name = data.first_name.length;
                var row_last = data.last_name.length;
                var row_class = data.classes.length;
                var value1, value2, value3;

                for (var i = 0; i < row_name; i++) {
                    value1 = data.first_name[i];
                    $("#first_name").append($("<option>").attr('value', value1).text(value1));
                }
                for (var i = 0; i < row_last; i++) {
                    value2 = data.last_name[i];
                    $("#last_name").append($("<option>").attr('value', value2).text(value2));
                }

                for (var i = 0; i < row_class; i++) {
                    value3 = data.classes[i];
                    $("#class").append($("<option>").attr('value', value3).text(value3));
                }

            }
        });
    });

    $("#class").on('change', function () {

        var url = $("#DataHeroByClass").attr('action');

        $.ajax({
            url: url + '/' + $(this).val(),
            type: 'GET',
            beforeSend: function () {
                $('#weapon').find('option').remove();
            },
            success: function (data) {

                var row_name = data.weapons.length;
                var value;

                for (var i = 0; i < row_name; i++) {
                    value = data.weapons[i];
                    $("#weapon").append($("<option>").attr('value', value).text(value));
                }
            },
        });
    });

    $(".delete_hero").on('click', function () {
        var row = $(this).parents('tr');
        var id = row.data('id');
        var url = $("#deleted_hero").attr('action');

        $.ajax({
            url: url,
            type: 'POST',
            dataType: 'JSON',
            data: {'_token': $('meta[name="csrf-token"]').attr('content'), 'id': id},
            success: function (result) {

                alert('Hero deleted');
                row.fadeOut();
            },
        });

    });

    $(".edit_hero").on('click', function () {

        var row = $(this).parents('tr');
        var id = row.data('id');
        var url = $("#DataHeroById").attr('action');

        $.ajax({
            url: url + '/' + $(this).val(),
            type: 'GET',
            beforeSend: function () {
                // $('#class').find('option').remove();
            },
            success: function (data) {

                var id;
                var firstname, lastname;
                var level;
                var raceh;
                var classes;
                var weapons;
                var strength, intelligence, dexterity;

                id = data.hero_data.id;
                firstname = data.hero_data.first_name;
                lastname = data.hero_data.last_name;
                level = data.hero_data.level;
                raceh = data.hero_data.race;
                classes = data.hero_data.class;
                weapons = data.hero_data.weapon;
                strength = data.hero_data.strength;
                dexterity = data.hero_data.dexterity;
                intelligence = data.hero_data.intelligence;

                $("#race").val(raceh).change();
                $("#id_hero").val(id);
                $("#first_name").val(firstname);
                $("#last_name").val(lastname);
                $("#level").val(level);
                $("#class").val(classes);
                $("#weapon").val(weapons);
                $("#strength").val(strength);
                $("#dexterity").val(dexterity);
                $("#intelligence").val(intelligence);
            },
        });
    });


    $('#manual').on('click', function () {

        $(".selector").attr("readonly", false);
        $(".selector").each(function () {

            $(this).val('default');
        });

        $(".selector2").attr("readonly", false);
        $(".selector2").each(function () {

            $(this).val('default');
        });

        $(".input-md").each(function () {
            $(this).val('');
        });

        $("#dexterity_text").text('');
        $("#strength_text").text('');
        $("#intelligence_text").text('');
    });

    $('#random').on('click', function () {

        var options = $(".selector > option");
        var random = Math.floor(options.length * (Math.random() % 1));

        $(".selector > option").attr('selected', false).eq(random).attr('selected', true).change();
        $(".selector").attr('readonly', true);

        var options2 = $("#class > option");
        var random2 = Math.floor(options2.length * (Math.random() % 1));

        $("#class > option").attr('selected', false).eq(random2).attr('selected', true).change();
        $("#class").attr('readonly', true);

        var options3 = $("#weapon > option");
        var random3 = Math.floor(options3.length * (Math.random() % 1));

        $("#weapon > option").attr('selected', false).eq(random3).attr('selected', true).change();
        $("#weapon").attr('readonly', true);

        var data_strength = getRangeStats();
        $("#strength_text").text('[' + data_strength + ']');
        $("#strength").val(getSumStats(data_strength));
        $("#strength").attr('readonly', true);

        var data_intelligence = getRangeStats();
        $("#intelligence_text").text('[' + data_intelligence + ']');
        $("#intelligence").val(getSumStats(data_intelligence));
        $("#intelligence").attr('readonly', true);

        var data_dexterity = getRangeStats();
        $("#dexterity_text").text('[' + data_dexterity + ']');
        $("#dexterity").val(getSumStats(data_dexterity));
        $("#dexterity").attr('readonly', true);


    });

    $("#discard").on('click', function () {

        $(".selector").each(function () {
            $(this).val('default');
        });

        $(".input-md").each(function () {
            $(this).val('');
        });

        $("#dexterity_text").text('');
        $("#strength_text").text('');
        $("#intelligence_text").text('');

    });

    $("#strength_button").click(function () {

        var data = getRangeStats();
        $("#strength_text").text('[' + data + ']');
        $("#strength").val(getSumStats(data));
        $("#strength").attr('readonly', true);
    });

    $("#intelligence_button").click(function () {

        var data = getRangeStats();
        $("#intelligence_text").text('[' + data + ']');
        $("#intelligence").val(getSumStats(data));
        $("#intelligence").attr('readonly', true);
    });

    $("#dexterity_button").click(function () {

        var data = getRangeStats();
        $("#dexterity_text").text('[' + data + ']');
        $("#dexterity").val(getSumStats(data));
        $("#dexterity").attr('readonly', true);
    });

});