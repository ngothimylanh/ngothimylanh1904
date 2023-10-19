#include<bits/stdc++.h>
using namespace std;
bool Sosanh(string x,string y)
{
	int a,b;
	if(x=="(") a=0;  if(y=="(") b=0;
	if(x=="-") a=1;  if(y=="-") b=1;
	if(x=="+") a=1;  if(y=="+") b=1;
	if(x=="/") a=2;  if(y=="/") b=2;
	if(x=="*") a=2;  if(y=="*") b=2;
	return (a>=b);
}
bool isToantu(char c)
{
	if(c=='+'||c=='-'||c=='*'||c=='/') return true;
	else return false;
}
string Hauto(string infix)
{
	stack<string>S;
	string Token="",posfix="",Top;
	for(int i=0;i<infix.size();i++)
	{
		if(infix[i]=='(')
		{
			Token=Token+infix[i];
			S.push (Token);
			Token="";
		}
		else
		{
			if(infix[i]==')')
			{
				Token=S.top();
				S.pop();
				while(Token!="(")
				{
					posfix= posfix+Token+' ';
					Token=S.top();
					S.pop();
				}
				Token="";
			}
			else
			{
					if(infix[i]>='0'&&infix[i]<='9')
				{
					posfix=posfix+infix[i];
				}
				else
				{
					Token=Token+infix[i];
					if(S.empty()) S.push(Token);
					else
					{
						Top=S.top();
						while(Sosanh(Top,Token))
						{
							S.pop();
							posfix=posfix+Top;
							Top=S.top();
						}
						S.push(Token);
					}
				    Token="";
				}
			}
	    }
	}
	while(!S.empty())
	{
		Token=S.top();
		S.pop();
		posfix=posfix+Token+' ';
	}
	return posfix;

}
int main()
{
	string s;
	cout<<"Nhap bieu thuc: "; 
	cin>>s;
	cout<<"Chuyen sang hau to: "<<Hauto(s);
}
