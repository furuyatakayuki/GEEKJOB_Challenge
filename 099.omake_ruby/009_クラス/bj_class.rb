class Player
    def initialize
        # 手札
        @my_cards = Array.new
        @limit = 16
        # print("[player limit: " + @limit.to_s + "]\n")
    end

    def open
        # 手札の合計
        sum = 0
        @my_cards.each do |i|
            sum += i
        end

        return sum
    end

    def set_card (draw)
        # 引いたカードを手札に追加
        draw.each do |i|
            @my_cards.push(i)
        end
    end

    def check_sum
        # まだカード引くかどうか
        if self.open < @limit
            return true
        else
            return false
        end
    end

    def card
        str = "[ "
        @my_cards.each do |i|
            str += i.to_s + " "
        end
        str += "]"

        return str
    end
end

class Dealer < Player
    def initialize
        # 山札
        piece = [1,2,3,4,5,6,7,8,9,10,10,10,10]
        @cards = Array.new
        @cards.concat(piece).concat(piece).concat(piece).concat(piece)
        @cards.shuffle!
        @my_cards = Array.new
        @limit = 17
        # print("[dealer limit: " + @limit.to_s + "]\n")
        # print("deck:" + @cards.to_s + "\n")
        # print(@cards.length.to_s + "枚\n")
    end

    def deal
        # 2枚配る
        return @cards.slice!(0..1)
    end

    def hit
        draw_array = Array.new
        draw_array.push(@cards.slice!(0))
        return draw_array
    end
end
