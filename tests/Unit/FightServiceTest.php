<?php
use PHPUnit\Framework\TestCase;

interface HeroInterface {
  public function getAttack(): int;

  public function getDefence(): int;

  public function getHealthPoints(): int;

  public function setHealthPoints(int $healthPoints);
}

interface DamageCalculatorInterface {

  public function calculateDamage(HeroInterface $attacker, HeroInterface $defender): int;
}

class FightService {
  /**
   * @var DamageCalculatorInterface
   */
  private $_damageCalculator;

  public function __construct(DamageCalculatorInterface $damageCalculator) {
    $this->_damageCalculator = $damageCalculator;
  }

  public function fight(HeroInterface $attacker, HeroInterface $defender) {
    $damage = $this->_damageCalculator->calculateDamage($attacker, $defender);

    $defender->setHealthPoints($defender->getHealthPoints() - $damage);
  }
}

class FightServiceTest extends TestCase {

  public function testFight(): void {
    $attacker = $this->createMock(HeroInterface::class);
    $defender = $this->createMock(HeroInterface::class);
    $defender
      ->expects($this->once())
      ->method('getHealthPoints')
      ->willReturn(21);
    $defender
      ->expects($this->once())
      ->method('setHealthPoints')
      ->with(16);

    $damageCalculator = $this->createMock(DamageCalculatorInterface::class);
    $damageCalculator
      ->expects($this->once())
      ->method('calculateDamage')
      ->with($attacker, $defender)
      ->willReturn(5);

    $fightService = new FightService($damageCalculator);
    $fightService->fight($attacker, $defender);
  }
}
?>
