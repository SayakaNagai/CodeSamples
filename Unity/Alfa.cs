using UnityEngine;
using System.Collections;
using System.Collections.Generic;

namespace Ateam
{

    public class Alfa : BaseBattleAISystem
    {
		/*
		bool selectAction( int player_num, int dis){
			if( dis <= 4 ){
				Ateam.BaseBattleAISystem.Action ( player_num, Define.Battle.ACTION_TYPE.ATTACK_SHORT); //ShortAttack
			}else if( dis > 4 && dis < 10 ){
				Ateam.BaseBattleAISystem.Action ( player_num, Define.Battle.ACTION_TYPE.ATTACK_MIDDLE); //MiddleAttack
			}else{
				Ateam.BaseBattleAISystem.Action ( player_num, Define.Battle.ACTION_TYPE.ATTACK_LONG); //LongAttack
			}
		}
*/
        //---------------------------------------------------
        // InitializeAI
        //---------------------------------------------------
        override public void InitializeAI()
        {

        }

        //---------------------------------------------------
        // UpdateAI
        //---------------------------------------------------
        override public void UpdateAI()
        {
			List<CharacterModel.Data> player = GetTeamCharacterDataList ( TEAM_TYPE.PLAYER );
			List<CharacterModel.Data> enemy = GetTeamCharacterDataList ( TEAM_TYPE.ENEMY );
			Vector2 player1_pos = player[1].BlockPos;
			Vector2 player2_pos = player[2].BlockPos;
			Vector2 enemy1_pos = enemy[1].BlockPos;
			//Debug.Log (player1_pos);
			//Debug.Log (enemy1_pos);

			int diff1 = (int)System.Math.Abs(player1_pos[0] - enemy1_pos[0]) + (int)System.Math.Abs(player1_pos[1] - enemy1_pos[1]);
			int diff2 = (int)System.Math.Abs(player2_pos[0] - enemy1_pos[0]) + (int)System.Math.Abs(player2_pos[1] - enemy1_pos[1]);

			Vector2 rightblock = player[1].BlockPos;

				if( diff1 > 1 && diff1 <= 4 ){
				//Action ( 1, Define.Battle.ACTION_TYPE.ATTACK_SHORT); //ShortAttack
				rightblock[0] = player1_pos [0] + 1;
				rightblock [1] = player1_pos [1];
				if (GetBlockType (rightblock) == Ateam.Define.Stage.BLOCK_TYPE.OBSTACLE) {
					Move (1, Common.MOVE_TYPE.LEFT);
				} else {
					Move (1, Common.MOVE_TYPE.UP);
				}	
				Action ( 1, Define.Battle.ACTION_TYPE.ATTACK_MIDDLE); //MiddleAttack
			}else if( diff1 > 4 && diff1 < 10 ){
				Action ( 1, Define.Battle.ACTION_TYPE.ATTACK_MIDDLE); //MiddleAttack
			}else{
				Action ( 1, Define.Battle.ACTION_TYPE.ATTACK_LONG); //LongAttack
			}

			if( diff2 > 1 && diff2 <= 4 ){
				//Action ( 2, Define.Battle.ACTION_TYPE.ATTACK_SHORT); //ShortAttack
				rightblock [0] = player2_pos [0] + 1;
				rightblock [1] = player2_pos [1];
				if (GetBlockType (rightblock) == Ateam.Define.Stage.BLOCK_TYPE.OBSTACLE) {
					Move (2, Common.MOVE_TYPE.LEFT);
				} else {
					Move (2, Common.MOVE_TYPE.UP);
				}
				Action ( 1, Define.Battle.ACTION_TYPE.ATTACK_MIDDLE); //MiddleAttack
			}else if( diff2 > 4 && diff2 < 10 ){
				Action ( 2, Define.Battle.ACTION_TYPE.ATTACK_MIDDLE); //MiddleAttack
			}else{
				Action ( 2, Define.Battle.ACTION_TYPE.ATTACK_LONG); //LongAttack
			}


			if (player1_pos [0] < enemy1_pos [0]) {
				Move (1, Common.MOVE_TYPE.RIGHT);
			} else if (player1_pos [0] > enemy1_pos [0]) {
				Move (1, Common.MOVE_TYPE.LEFT);
			} else {
				//Move ( 1, Common.MOVE_TYPE.NONE );
			}

			if (player1_pos [1] < enemy1_pos [1]) {
				Move (1, Common.MOVE_TYPE.UP);
			} else if (player1_pos [1] > enemy1_pos [1]) {
				Move (1, Common.MOVE_TYPE.DOWN);
			} else {
				//Move ( 1, Common.MOVE_TYPE.NONE );
			}



			if (player2_pos [1] < enemy1_pos [1]) {
				Move (2, Common.MOVE_TYPE.UP);
			} else if (player2_pos [1] > enemy1_pos [1]) {
				Move (2, Common.MOVE_TYPE.DOWN);
			} else {
				//Move ( 1, Common.MOVE_TYPE.NONE );
			}

			if (player2_pos [0] < enemy1_pos [0]) {
				Move (2, Common.MOVE_TYPE.RIGHT);
			} else if (player2_pos [0] > enemy1_pos [0]) {
				Move (2, Common.MOVE_TYPE.LEFT);
			} else {
				//Move ( 1, Common.MOVE_TYPE.NONE );
			}

        }

        //---------------------------------------------------
        // ItemSpawnCallback
        //---------------------------------------------------
        override public void ItemSpawnCallback(ItemSpawnData itemData)
        {

        } 
    }
}