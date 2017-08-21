# トランプゲームのブラックジャック
# ・トランプのマークは意識しなくても良いです。1-13×4の52枚。
# ・チップの概念は不要です。
# ・1は1と11として計算可能ですが、1に固定してもOKです。
# ・全自動でOKです。プレイヤーにHitの判断をさせる必要はありません。

require './bj_class.rb'

player = Player.new

dealer = Dealer.new


dealer.set_card(dealer.deal)
player.set_card(dealer.deal)

while dealer.check_sum || player.check_sum
    if dealer.check_sum
        dealer.set_card(dealer.hit)
    end
    if player.check_sum
        player.set_card(dealer.hit)
    end
end

win_lose = "[draw]\n"

if dealer.open <= 21 && (dealer.open >= player.open || player.open > 21)
    win_lose = "[player lose]\n"
end
if player.open <= 21 && (dealer.open < player.open || dealer.open > 21)
    win_lose = "[player win]\n"
end

print("\n-----------[result]-----------\n")
print(win_lose)
print("dealer card: " + dealer.card + "\n")
print("power: " + dealer.open.to_s + "\n")
print("\n")
print("player card: " + player.card + "\n")
print("power: " + player.open.to_s + "\n")
print("------------------------------\n\n")
