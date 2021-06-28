<?php

namespace CBEXT;

use Psr\Container\ContainerInterface;

/**
 * Интерфейс расширения ядра КБ
 * 
 * Описывает методы расширения, которые ядро КБ вызывает в процессе взаимодействия с расширениями
 * 
 */
interface ExtensionInterface extends ContainerInterface
{
    /**
     * Инициализация расширения
     * 
     * Вызывается сразу после создания объекта расширения
     * 
     * @param ExtensionStewardInterface $steward объект, предоставляющий сервисы ядра КБ
     * @param array $settings массив, содержащий настройки расширения
     * @return void 
     */
    public function init(ExtensionStewardInterface $steward, array $settings);

    /**
     * Активация расширения
     * 
     * Вызывается при включении расширения в настройках КБ
     * 
     * Должны быть созданы все необходимые для работы расширения структуры
     * 
     * @return array массив, содержащий стартовые настройки расширения
     */
    public function activate(): array;

    /**
     * Деактивация расширения
     * 
     * Вызывается при отключении расширения в настройках КБ
     * 
     * Должны быть удалены все созданные расширением объекты
     * 
     * @return void
     */
    public function deactivate(): void;

    /**
     * Проверить настройки перед сохранением в БД КБ
     * 
     * Расширение должно подтвердить сохранение настроек в случае их изменения по стороннему запросу.
     * 
     * В случае, если предъявленные настройки не должны быть сохранены, метод должен вызвать исключение RuntimeException
     * 
     * @param array $settings массив настроек, предложенных к сохранению
     * @return array массив настроек, который расширение позволяет сохранить
     * 
     * @throws RuntimeException если настройки не должны быть сохранены
     */
    public function checkSettings(array $settings): array;

    /**
     * Получить фронт-интерфейс (html-код) настроек расширения.
     * 
     * @return string html-код, который будет вставлен на странице настроек расширения в настройках КБ
     */
    public function showSettings(array $settings): string;
}