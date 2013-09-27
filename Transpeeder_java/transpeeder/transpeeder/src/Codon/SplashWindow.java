package Codon;

import java.awt.*;
import java.awt.event.*;

import javax.swing.*;

public class SplashWindow extends JWindow implements ActionListener{
    JLabel back=new JLabel() {
        public void paintComponent(Graphics g) {
        	ImageIcon background=new ImageIcon(codon.class.getResource("/images/test.jpg")); 
            // ͼƬ�洰���С���仯
            g.drawImage(background.getImage(), 0, 0, this.getSize().width,this.getSize().height,this);
        }
    };    

JProgressBar progressBar=new JProgressBar(1,100);//������
Timer timer;//ʱ�����
 public SplashWindow(){
	Container con=this.getContentPane(); 
	setCursor(Cursor.getPredefinedCursor(Cursor.WAIT_CURSOR));
	progressBar.setStringPainted(true);   //�����������ʾ�ı�
	progressBar.setString("���ڼ��س���......");
	con.add(back,"Center");
	con.add(progressBar,"South");
	setSize(400,300);
	toFront();        //ʹ�����Ƶ���ǰ
	Dimension size = Toolkit.getDefaultToolkit().getScreenSize();
	setLocation((size.width-getWidth())/2,(size.height-getHeight())/2);
	setVisible(true);
	timer=new javax.swing.Timer(100, this);   //����ʱ�����
	timer.addActionListener(this);
	timer.start();  //����ʱ���������ʼ��ʱ��1/10����Զ�������Ϊ�¼�
 }
 
	public void actionPerformed(ActionEvent e) {
		if(progressBar.getValue()<100){
			progressBar.setValue(progressBar.getValue()+1);//���ý�������ֵ
			timer.restart();
		}else{
			timer.stop();  //ֹͣʱ��
			dispose();    
			new codon();  //����������
		}		
	}
	public static void main(String[] args) {
		// TODO Auto-generated method stub
		new SplashWindow(); //��������
		
	}

}
