$(document).ready(function () {

    $("#race").on('change', function () {

        var url = $("#DataMonsterByRace").attr('action');

        $.ajax({
            url: url + '/' + $(this).val(),
            type: 'GET'
            ,
            beforeSend: function () {
                $("#monster_name").val('');
                $('#abilities').find('option').remove();

            },
            success: function (data) {

                var name_monster = data.name_monster;
                var row_abilities = data.abilities.length;
                var value;

                $("#monster_name").val(name_monster).attr('readonly', true);
                for (var i = 0; i < row_abilities; i++) {
                    value = data.abilities[i];
                    $("#abilities").append($("<option>").attr('value', value).text(value));
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
                // $('#weapon').find('option').remove().end().append('<option value="default">Choose Weapon</option>').val('');
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

    $(".delete_monster").on('click', function () {
        var row = $(this).parents('tr');
        var id = row.data('id');
        var url = $("#deleted_monster").attr('action');

        $.ajax({
            url: url,
            type: 'POST',
            dataType: 'JSON',
            data: {'_token': $('meta[name="csrf-token"]').attr('content'), 'id': id},
            success: function (result) {

                alert('Monster deleted');
                row.fadeOut();
            },
        });
    });

    $(".edit_monster").on('click', function () {

        var row = $(this).parents('tr');
        var id = row.data('id');
        var url = $("#DataMonsterById").attr('action');

        $.ajax({
            url: url + '/' + $(this).val(),
            type: 'GET',
            beforeSend: function () {
                // $('#weapon').find('option').remove().end().append('<option value="default">Choose Weapon</option>').val('');

            },
            success: function (data) {
                var id;
                var name;
                var level;
                var race;
                var strength, intelligence, dexterity;

                id = data.monster_data.id;
                name = data.monster_data.name;
                level = data.monster_data.level;
                race = data.monster_data.race;
                strength = data.monster_data.strength;
                dexterity = data.monster_data.dexterity;
                intelligence = data.monster_data.intelligence;

                $("#race").val(race).change();
                $("#id_monster").val(id);
                $("#level").val(level);
                $("#monster_name").val(name);
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
        $(".input-md").each(function () {

            $(this).val('');
        });

        $("#dexterity_text").text('');
        $("#strength_text").text('');
        $("#intelligence_text").text('');

    });

    $('#random').on('click', function () {

        $(".selector").attr("readonly", true);
        $(".selector").each(function () {
            var options = $(this).children('option');
            var random = Math.floor(options.length * (Math.random() % 1));
            options.attr('selected', false).eq(random).attr('selected', true);
        }).change();

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
    });

    $("#strength_button").click(function () {

        var data = getRangeStats();
        $("#strength_text").text('[' + data + ']');
        $("#strength").val(getSumStats(data)).attr('readonly', true);
    });
    $("#intelligence_button").click(function () {

        var data = getRangeStats();
        $("#intelligence_text").text('[' + data + ']');
        $("#intelligence").val(getSumStats(data)).attr('readonly', true);

    });

    $("#dexterity_button").click(function () {

        var data = getRangeStats();
        $("#dexterity_text").text('[' + data + ']');
        $("#dexterity").val(getSumStats(data)).attr('readonly', true);
    });
});