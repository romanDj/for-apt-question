<div class="card mt-3">
    <div class="card-body">
        <form class="p-2 text-left" action="" method="post">
            <input type="hidden" name="<?= Yii::$app->request->csrfParam ?>" value="<?= Yii::$app->request->getCsrfToken() ?>">
            <p class="h5 mb-4">Анкета с вопросами</p>

            <ol>
                <?php foreach ($questions as $quest): ?>
                <li class="mb-4">
                    <label><?= $quest->question->content ?></label>
                    <?php if($quest->question->answers): ?>
                        <?php foreach ($quest->question->answers as $ans): ?>
                            <?php if($quest->question->multi == 0):?>
                            <div class="custom-control custom-radio">
                                <input value="<?= $ans->answerContent->id ?>" type="radio"
                                       class="custom-control-input" id="question<?= $quest->question->id  ?>Answer<?= $ans->answerContent->id ?>" name="question[<?= $quest->question->id ?>][]" required>
                                <label class="custom-control-label" for="question<?= $quest->question->id  ?>Answer<?= $ans->answerContent->id ?>"><?= $ans->answerContent->name ?></label>
                            </div>
                            <?php else: ?>
                                <div class="custom-control custom-checkbox">
                                    <input value="<?= $ans->answerContent->id ?>" type="checkbox"
                                           class="custom-control-input" id="question<?= $quest->question->id  ?>Answer<?= $ans->answerContent->id ?>" name="question[<?= $quest->question->id ?>][]">
                                    <label class="custom-control-label" for="question<?= $quest->question->id  ?>Answer<?= $ans->answerContent->id ?>"><?= $ans->answerContent->name ?></label>
                                </div>
                            <?php endif;?>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <textarea class="form-control" name="dist[<?= $quest->question->id ?>]" id="question<?= $quest->question->id  ?>" rows="4"></textarea>
                    <?php  endif; ?>
                </li>
                <?php endforeach; ?>
<!--                <li class="mb-3">-->
<!--                    <label>Достаточно ли было консультаций?</label>-->
<!--                    <div class="custom-control custom-radio">-->
<!--                        <input type="radio" class="custom-control-input" id="defaultGroupExample3" name="groupOfDefaultRadios1">-->
<!--                        <label class="custom-control-label" for="defaultGroupExample3">Да</label>-->
<!--                    </div>-->
<!--                    <div class="custom-control custom-radio">-->
<!--                        <input type="radio" class="custom-control-input" id="defaultGroupExample4" name="groupOfDefaultRadios1">-->
<!--                        <label class="custom-control-label" for="defaultGroupExample4">Нет</label>-->
<!--                    </div>-->
<!--                </li>-->
<!---->
<!--                <li class="mb-3">-->
<!--                    <label>Предоставляется ли Вам на предприятии необходимая информация (документация, материалы, чертежи)?</label>-->
<!--                    <div class="custom-control custom-radio">-->
<!--                        <input type="radio" class="custom-control-input" id="defaultGroupExample5" name="groupOfDefaultRadios2">-->
<!--                        <label class="custom-control-label" for="defaultGroupExample5">Да</label>-->
<!--                    </div>-->
<!--                    <div class="custom-control custom-radio">-->
<!--                        <input type="radio" class="custom-control-input" id="defaultGroupExample6" name="groupOfDefaultRadios2">-->
<!--                        <label class="custom-control-label" for="defaultGroupExample6">Нет</label>-->
<!--                    </div>-->
<!--                </li>-->
            </ol>
            <button class="btn btn-light-green btn-block" type="submit">Завершить тест</button>

        </form>
    </div>

</div>